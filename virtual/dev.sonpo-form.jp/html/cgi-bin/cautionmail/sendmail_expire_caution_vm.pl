#!/usr/bin/perl

BEGIN {
  unshift @INC, '/var/www/virtual/dev.sonpo-form.jp/cgi-bin/cautionmail/lib';
}
use strict;
use Time::Local;
use Sonpo::DBHandle;
use Sonpo::Sender;
use Sonpo::Config;
use Jcode;

my $config=Sonpo::Config->get_config;

my $dbh=Sonpo::DBHandle->get_handle;

# 5Æü¸å
my $time_5day=time()+432000;

#my $year_5day =$time_5day[5]+1900;
#my $month_5day=$time_5day[4]+1;
#my $day_5day  =$time_5day[3];

my $sql=
    "SELECT
      inst_id,
      year_1,month_1,day_1,
      year_3,month_3,day_3,
      status
    FROM 
      instructor
    WHERE
      status=0
      OR
      status=1";

my $sth=$dbh->prepare($sql);
$sth->execute();

while (my $ref=$sth->fetchrow_arrayref()) {
#print 'all:'.$ref->[0]."\n";
#print '5time :'.$time_5day."\n";
#if($ref->[4]){
#print 'dtime3:'.timelocal(0 ,0 ,0 ,$ref->[6] ,$ref->[5] - 1 ,$ref->[4])."\n";
#}
#if($ref->[1]){
#print 'dtime1:'.timelocal(0 ,0 ,0 ,$ref->[3] ,$ref->[2] - 1 ,$ref->[1])."\n";
#}
#print "\n";

  if($ref->[4]){
    if(timelocal(0 ,0 ,0 ,$ref->[6] ,$ref->[5] - 1 ,$ref->[4])<$time_5day){

      my $body=sprintf(
        $config->{expire_mail_tmpl},
        $ref->[4],
        $ref->[5],
        $ref->[6],
        $ref->[0]
      );

      my $sender=Sonpo::Sender->new(
        to      => $config->{admin_mail},
        from    => $config->{mail_from},
        subject => $config->{subject},
        body    => $body,
      );
      $sender->send;
      
#      print 'type3:'.$ref->[0]."\n";
    }
  }elsif($ref->[1]){
    if(timelocal(0 ,0 ,0 ,$ref->[3] ,$ref->[2] - 1 ,$ref->[1])<$time_5day){

      my $body=sprintf(
        $config->{expire_mail_tmpl},
        $ref->[1],
        $ref->[2],
        $ref->[3],
        $ref->[0]
      );

      my $sender=Sonpo::Sender->new(
        to      => $config->{admin_mail},
        from    => $config->{mail_from},
        subject => $config->{subject},
        body    => $body,
      );
      $sender->send;

#      print 'type1:'.$ref->[0]."\n";
    }
  }
#   print $ref->[3]."\n";
}

exit;

