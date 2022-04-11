package Sonpo::Config;

#------------------------------------------------------------------------------#

use strict;

my $config={
  expire_mail_tmpl  => '%sǯ%s��%s���»ܡʼ����ֹ�%s�ˤιֱ��ˤĤ��ơ��ֱ�ͽ�����ޤ�5�����ڤ�ޤ����������ơ��������ֳ���פˤʤäƤ��ޤ���

�������̡�https://www.sonpo-form.jp/manage/forms/
',

  mail_from  => 'consumer@sonpo.or.jp',
  subject    => '�ڹֻ��ɸ��۹ֱ���5����',
  admin_mail => 'consumer@sonpo.or.jp',

};

#------------------------------------------------------------------------------#

sub get_config{
  my $class=shift;

  return $config;
}

#------------------------------------------------------------------------------#

1;
