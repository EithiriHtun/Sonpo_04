package Sonpo::Sender;

# $Id: $

use strict;
use Jcode;
# use MIME::Base64;

#------------------------------------------------------------------------------#

sub new{
  my $class=shift;
  
  my $self=bless{
    sendmail     => '/usr/sbin/sendmail',
    to           => undef,
    cc           => undef,
    bcc          => undef,
    errorto      => undef,
    from         => undef,
    subject      => undef,
    body         => undef,
    attach_files => [],
    @_,

  },$class;

  return $self;
}

#------------------------------------------------------------------------------#

sub sendmail    {my $self=shift; return  $self->{sendmail};}
sub to          {my $self=shift; return  $self->{to};}
sub from        {my $self=shift; return  $self->{from};}
sub subject     {my $self=shift; return  $self->{subject};}
sub body        {my $self=shift; return  $self->{body};}
sub attach_files{my $self=shift; return  $self->{attach_files};}

#------------------------------------------------------------------------------#

sub send{
  my $self=shift;
  
  my $sendmail=$self->sendmail;
  my $errorto =$self->{errorto} || $self->{from};
  my $cmd     ="| ${sendmail} -t -oi -f ${errorto}";

  my $bound='----Boundary'.sprintf("%08d",rand(1000000));

  my @attach_data;
  foreach(@{$self->attach_files}){
    open(FILE,"$_")|| return 'cannot open log_file';
    my $tmp=encode_base64(join('',<FILE>));
    push @attach_data, $tmp;
    close(FILE);
  }

  my $to     =$self->to;
  my $from   =$self->from;
  my $body   =Jcode->new($self->body)->jis;
#  my $subject=Jcode->new($self->subject)->mime_encode;
  my $subject=Jcode->new($self->subject)->jis;
  my $bcc    =$self->{bcc};

  my $header=<<____HEADER;
To: ${to}
From: ${from}
Subject: ${subject}
Bcc: ${bcc}
MIME-Version: 1.0
____HEADER

  my $mail_body='';
  if($attach_data[0] ne ''){
    $mail_body=<<___BODY;
Content-Type: multipart/mixed; boundary="${bound}"
--${bound}
Content-Transfer-Encoding: 7bit
Content-Type: text/plain; charset="iso-2022-jp"

${body}
___BODY

    foreach(0..$#attach_data){
      my $attach_name=$self->attach_files->[$_];
      $attach_name=~s/^.*\/([^\/]+)$/$1/;
      $mail_body.=<<___BODY;

--${bound}
Content-Type: application/octet-stream; name="${attach_name}"
Content-Transfer-Encoding: BASE64
Content-Disposition: attachment; filename="${attach_name}"

${attach_data[$_]}
___BODY

    }

  $mail_body.=<<___BODY;

--${bound}--

___BODY

  }else{
    $mail_body=<<___BODY;
Content-Transfer-Encoding: 7bit
Content-Type: text/plain; charset="iso-2022-jp"

${body}
___BODY

  }

  if($to){
    open(MAIL,$cmd) or return 'cannot open sendmail command';
    print MAIL $header, $mail_body;
    close(MAIL);
  }else{
    return 'cannot find e-mail address for To: ';
  }
  
  return 0;
}

#------------------------------------------------------------------------------#

1;
