package MyMail;

use	strict;

use Jcode;


# FUNC----------------------------------------------------------------------------------------------------------
#	概要		：メールを送信する																				
#	メソッド名	：send																							
#	引数		：SCALAR		メール情報を設定したハッシュのリファレンス										
#				：キー名		値								必須											
#				：to			送信先メールアドレス			○												
#				：cc			Carbon Copy						省略可											
#				：bcc			Blind Carbon Copy				省略可											
#				：from			送信者のメールアドレス			○												
#				：errto			エラーメール用のメールアドレス	省略時、fromと同じ								
#				：subject		メールタイトル					○												
#				：body			メール本文						○												
#				：addheader		mailヘッダに追加する文字列		省略可											
#				：kcode			subject、body等の文字コード		○('sjis','euc'など)							
#				：sendmail		sendmailのパス					省略時、/usr/sbin/sendmail						
#	戻り値		：正常時		真																				
#				：異常時		偽																				
#	備考		：文字コードはeucのままでデータを設定すること。JISへの変換は、この関数内で行う。				
#				：to、cc、bccに複数のアドレスを設定する場合には、アドレスを","(カンマ)で区切ること。			
#				：なお、日本語を設定しても良いのはsubjectとbodyのみとする。										
#	作成者		：橋本　敬介																					
#	変更履歴	：2000/12/19																					
# FUNC----------------------------------------------------------------------------------------------------------
sub send
{
	my $rh			= shift;		# 引数を取得
	my $sendmail	= $rh->{ 'sendmail' } || '/usr/sbin/sendmail';
	my $errto		= $rh->{ 'errto' } || $rh->{ 'from' };
	
	return 0 unless -e $sendmail;		# sendmailが存在しなければ偽を返す
	
	my $cmd		= "| $sendmail -t -oi -f $errto";	# sendmailへのパイプ用コマンド作成
	my $header;
	my $subject	= $rh->{ 'subject' };
	my $body	= $rh->{ 'body' };
	my $addheader	= $rh->{ 'addheader' } || '';
	
	if( $addheader ne '' )	{
		# 追加mailヘッダが指定された場合
		$addheader	=~ s/(?:\015\012|\015)/\n/g;	# 改行コードをLFに統一
		$addheader	=~ s/\012+$//;					# 末尾の改行を削除
		$addheader	.= "\n";						# 末尾に改行を１つつける
	}
	
	Jcode::convert( \$subject, 'jis', $rh->{ 'kcode' } );		# 題名をJISへ変換してからMIMEエンコード
	$subject	= mail64encode( $subject );
	
	Jcode::convert( \$body, 'jis', $rh->{ 'kcode' } );			# 本文をJISへ変換
	
	# 送信先アドレスの設定
	$header	=	"To: $rh->{ 'to' }\n";
	$header	.=	"Cc: $rh->{ 'cc' }\n"	if $rh->{ 'cc' };
	$header	.=	"Bcc: $rh->{ 'bcc' }\n"	if $rh->{ 'bcc' };
	
	# 送信先アドレス以外のヘッダの設定
	$header	.= <<____HEADER;
From: $rh->{ 'from' }
Subject: $subject
MIME-Version: 1.0
Content-Transfer-Encoding: 7bit
Content-Type: text/plain; charset="iso-2022-jp"
$addheader
____HEADER
	
	# メール送信
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
