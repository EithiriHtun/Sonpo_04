package Sonpo::DBHandle;

# $Id: $

use strict;
use DBI;
use Carp ();

my %_handles;

#------------------------------------------------------------------------------#

sub get_handle{
  my $class=shift;

  my $type=shift;

  return $_handles{$type} if defined $_handles{$type};
  eval{
    $_handles{$type}=DBI->connect(
      'DBI:mysql:newscms:localhost',
      'sonpo',
      '07dpm05',
      {
        RaiseError => 1,
      }
    );
  };
=comment
  eval{
    $_handles{$type}=DBI->connect(
      'dbi:mysqlPP:database=newscms;host=localhost',
      'sonpo',
      '07dpm05',
      {
        RaiseError => 1,
      }
    );
  };
=cut
  return $_handles{$type};
}

#------------------------------------------------------------------------------#

1;
