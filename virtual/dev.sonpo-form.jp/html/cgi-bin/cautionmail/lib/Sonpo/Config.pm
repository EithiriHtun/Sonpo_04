package Sonpo::Config;

#------------------------------------------------------------------------------#

use strict;

my $config={
  expire_mail_tmpl  => '%s年%s月%s日実施（受付番号%s）の講演会について、講演予定日まで5日を切りましたが、ステータスが「確定」になっていません。

管理画面　https://www.sonpo-form.jp/manage/forms/
',

  mail_from  => 'consumer@sonpo.or.jp',
  subject    => '【講師派遣】講演日5日前',
  admin_mail => 'consumer@sonpo.or.jp',

};

#------------------------------------------------------------------------------#

sub get_config{
  my $class=shift;

  return $config;
}

#------------------------------------------------------------------------------#

1;
