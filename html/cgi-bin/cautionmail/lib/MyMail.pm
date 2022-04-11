package MyMail;

use	strict;

use Jcode;


# FUNC----------------------------------------------------------------------------------------------------------
#	����		���᡼�����������																				
#	�᥽�å�̾	��send																							
#	����		��SCALAR		�᡼���������ꤷ���ϥå���Υ�ե����										
#				������̾		��								ɬ��											
#				��to			������᡼�륢�ɥ쥹			��												
#				��cc			Carbon Copy						��ά��											
#				��bcc			Blind Carbon Copy				��ά��											
#				��from			�����ԤΥ᡼�륢�ɥ쥹			��												
#				��errto			���顼�᡼���ѤΥ᡼�륢�ɥ쥹	��ά����from��Ʊ��								
#				��subject		�᡼�륿���ȥ�					��												
#				��body			�᡼����ʸ						��												
#				��addheader		mail�إå����ɲä���ʸ����		��ά��											
#				��kcode			subject��body����ʸ��������		��('sjis','euc'�ʤ�)							
#				��sendmail		sendmail�Υѥ�					��ά����/usr/sbin/sendmail						
#	�����		�������		��																				
#				���۾��		��																				
#	����		��ʸ�������ɤ�euc�Τޤޤǥǡ��������ꤹ�뤳�ȡ�JIS�ؤ��Ѵ��ϡ����δؿ���ǹԤ���				
#				��to��cc��bcc��ʣ���Υ��ɥ쥹�����ꤹ����ˤϡ����ɥ쥹��","(�����)�Ƕ��ڤ뤳�ȡ�			
#				���ʤ������ܸ�����ꤷ�Ƥ��ɤ��Τ�subject��body�ΤߤȤ��롣										
#	������		�����ܡ��ɲ�																					
#	�ѹ�����	��2000/12/19																					
# FUNC----------------------------------------------------------------------------------------------------------
sub send
{
	my $rh			= shift;		# ���������
	my $sendmail	= $rh->{ 'sendmail' } || '/usr/sbin/sendmail';
	my $errto		= $rh->{ 'errto' } || $rh->{ 'from' };
	
	return 0 unless -e $sendmail;		# sendmail��¸�ߤ��ʤ���е����֤�
	
	my $cmd		= "| $sendmail -t -oi -f $errto";	# sendmail�ؤΥѥ����ѥ��ޥ�ɺ���
	my $header;
	my $subject	= $rh->{ 'subject' };
	my $body	= $rh->{ 'body' };
	my $addheader	= $rh->{ 'addheader' } || '';
	
	if( $addheader ne '' )	{
		# �ɲ�mail�إå������ꤵ�줿���
		$addheader	=~ s/(?:\015\012|\015)/\n/g;	# ���ԥ����ɤ�LF������
		$addheader	=~ s/\012+$//;					# �����β��Ԥ���
		$addheader	.= "\n";						# �����˲��Ԥ򣱤ĤĤ���
	}
	
	Jcode::convert( \$subject, 'jis', $rh->{ 'kcode' } );		# ��̾��JIS���Ѵ����Ƥ���MIME���󥳡���
	$subject	= mail64encode( $subject );
	
	Jcode::convert( \$body, 'jis', $rh->{ 'kcode' } );			# ��ʸ��JIS���Ѵ�
	
	# �����襢�ɥ쥹������
	$header	=	"To: $rh->{ 'to' }\n";
	$header	.=	"Cc: $rh->{ 'cc' }\n"	if $rh->{ 'cc' };
	$header	.=	"Bcc: $rh->{ 'bcc' }\n"	if $rh->{ 'bcc' };
	
	# �����襢�ɥ쥹�ʳ��Υإå�������
	$header	.= <<____HEADER;
From: $rh->{ 'from' }
Subject: $subject
MIME-Version: 1.0
Content-Transfer-Encoding: 7bit
Content-Type: text/plain; charset="iso-2022-jp"
$addheader
____HEADER
	
	# �᡼������
	open( MAIL, $cmd ) or return 0;
	print MAIL $header, $body;
	close MAIL;
	
	return 1;
}

sub mail64encode {
	my $xx	=	$_[0];
	$xx	=~	s/\x1b\x28\x42/\x1b\x28\x4a/g;
	$xx	=	base64encode( $xx );
	return "=?iso-2022-jp?B?$xx?=";
}

sub base64encode {
	my $base	=	"ABCDEFGHIJKLMNOPQRSTUVWXYZ"
				.	"abcdefghijklmnopqrstuvwxyz"
				.	"0123456789+/";
	my ($xx, $yy, $zz, $i);
	
	$xx	=	unpack( "B*", $_[0] );
	for( $i = 0; $yy = substr( $xx, $i, 6 ); $i += 6 )	{
		$zz	.=	substr( $base, ord( pack( "B*", "00" . $yy ) ), 1 );
		if( length( $yy ) == 2 )	{
			$zz	.=	"==";
			last;
		}elsif( length( $yy ) == 4 )	{
			$zz	.=	"=";
			last;
		}
	}
	return $zz;
}

1;
