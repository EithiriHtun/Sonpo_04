#!/usr/bin/perl

BEGIN {
  unshift @INC, '/var/www/cgi-bin/cautionmail/lib';
}
use strict;
use Sonpo::DBHandle;
use Jcode;

my $dbh=Sonpo::DBHandle->get_handle;

my $sth_member=$dbh->prepare(
  "SELECT
    email
  FROM
    members
  WHERE
    no_send_mail=0"
);
$sth_member->execute();
my @members;
while (my $ref = $sth_member->fetchrow_arrayref()) {
  push(@members,$ref->[0]);
}
$sth_member->finish();

## list without no_send_mail
open(MEM,">./members_list.txt");
foreach(@members){
  print MEM $_."\n";
}
close(MEM);



my $sth_bizuser=$dbh->prepare(
  "SELECT
    email,
    bizuser_id
  FROM
    bizuser_table
  WHERE
    no_send_mail=0"
);
$sth_bizuser->execute();
my @bizusers;
my @bizids;
while (my $ref = $sth_bizuser->fetchrow_arrayref()) {
  push(@bizusers,$ref->[0]);
  push(@bizids,$ref->[1]);
}
$sth_bizuser->finish();

foreach(@bizids){
  my $sth_bizchild=$dbh->prepare(
    sprintf(
      "SELECT
        email
      FROM
        bizuser_child_table
      WHERE
        bizuser_id=%d",
      $_
    )
  );
  $sth_bizchild->execute();
  while (my $ref=$sth_bizchild->fetchrow_arrayref()){
    if(!grep{$_ eq $ref->[0]} @bizusers ){
      push(@bizusers,$ref->[0]);
    }
  }
  $sth_bizchild->finish();
}

## list without no_send_mail
open(MEM,">./bizusers_list.txt");
foreach(@bizusers){
  print MEM $_."\n";
}
close(MEM);

$dbh->disconnect();

exit;

