#!/usr/bin/perl

use DBI;
use Time::Local;
use MyMail;

# �f�[�^�x�[�X�ɐڑ�
my $dbh = &connect_db();

my $sql='SELECT inst_id, year_1, month_1, day_1, year_2, month_2, day_2, year_3, month_3, day_3 FROM instructor WHERE status=0';

my $sth=$dbh->prepare($sql);
$sth->execute();

while (my $ref=$sth->fetchrow_hashref()) {
  if($ref->{year_3}){
    if(
      timelocal(0,0,0,$ref->{day_3},($ref->{month_3} - 1),($ref->{year_3} - 1900))
      - time() < 5*24*60*60
    ){
      &send_alert($ref->{inst_id});
    }
  }else{
    if($ref->{year_2}){
      if(
        timelocal(0,0,0,$ref->{day_2},($ref->{month_2} - 1),($ref->{year_2} - 1900))
        - time() < 5*24*60*60 ||
        timelocal(0,0,0,$ref->{day_1},($ref->{month_1} - 1),($ref->{year_1} - 1900))
        - time() < 5*24*60*60
      ){
        &send_alert($ref->{inst_id});
      }
    }else{
      if(
        timelocal(0,0,0,$ref->{day_1},($ref->{month_1} - 1),($ref->{year_1} - 1900))
        - time() < 5*24*60*60
      ){
        &send_alert($ref->{inst_id});
      }
    }
  }
}
&disconnect_db( $dbh );



sub connect_db{
	my ($dbh, $dsn);
	
	$dsn="DBI:mysql:database=newscms:host=localhost";
	
	$dsn	.=	join ';',
				map { join '=', $_, $param{$_} }
				grep { exists $param{$_} }
				qw/ dbname host port options tty /;
	
	$dbh	=	DBI->connect(
		$dsn, 'sonpo', '07dpm05',{'RaiseError' => 1}
	);
	
	if( $param{scheme} )	{
		$dbh->do("SET search_path TO $param{scheme}");
	}
	
	return $dbh;
}

sub disconnect_db{
	my $dbh	=	shift;
	$dbh->disconnect() if $dbh;
}

sub send_alert{
    my $inst_id=shift;

	my $mail={
	  body => '��t�ԍ�:'.$inst_id.' �̍u�t�h���\���݂͍u���\����܂łT����؂�܂������A�X�e�[�^�X���u�m��v�ɂȂ��Ă��܂���B',
	  subject => '�y�u�t�h���z�u���\����ɂ���',
	  from    => 'consumer@sonpo.or.jp',
	  to      => 'consumer@sonpo.or.jp',
	};
	
	# ���[�����M
	unless( MyMail::send( $mail ) )	{
		$self->param( 'error' => [ '���[�����M�ŃG���[���������܂���' ] );
	}
	
	return 1;
}
