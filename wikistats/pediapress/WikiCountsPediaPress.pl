#!/usr/bin/perl

  no warnings 'uninitialized';
  no warnings 'once';

  use lib "/home/ezachte/lib" ;
  use EzLib ;
  $trace_on_exit = $true ;
  ez_lib_version (10) ;

  use WikiCountsConversions ;
  use WikiCountsLanguage ;
  use WikiCountsOutput ;
  use WikiCountsLog ;

  $dir_in  = "W:/\# In PediaPress" ;
  $dir_out = "W:/\@ Report Card/PediaPress" ;

  print "Read from folder $dir_in\n" ;
  print "Write from folder $dir_out\n" ;

  $file_csv_country_codes = "CountryCodes.csv" ;
  $file_csv_country_meta_info = "SquidReportCountryMetaInfo.csv" ;

  &ReadInputCountriesNames ;

  ($mm_now,$yyyy_now) = (gmtime(time)) [4,5] ;
  $yyyy_now += 1900 ;
  $mm_now ++ ;

  $yyyy = 2010 ;
  $mm = 8 ;
  while (($yyyy < $yyyy_now) || (($yyyy == $yyyy_now) && ($mm <$mm_now)))
  {
    $yyyy_mm = sprintf ("%04d-%02d", $yyyy, $mm) ;
    $file  = "$dir_in/wmf_report_$yyyy_mm.csv" ;

    if (- $file)
    {
      print "Read $file\n" ;
      &ReadMonthlySales ($file) ;
    }


    $mm ++ ;
    if ($mm > 12)
    { $mm = 1 ; $yyyy++ ; }
  }

  &ProcessMonthlySales ;

  &WriteMonthlySales ("$dir_out/BookToolSalesMonthlyDetailedOneRowPerMonth.csv",
                      "$dir_out/BookToolSalesMonthlyDetailedBreakdownPerCountry.csv",
                      "$dir_out/BookToolSalesMonthlyConciseBooksShippedOnly.csv") ;

  print "\nRead from folder $dir_in\n" ;
  print "Write from folder $dir_out\n" ;

  print "\n\Ready\n\n" ;
  exit ;


sub ReadInputCountriesNames
{
  $path_csv_country_codes = "W:/! Perl/Squids/Archive/$file_csv_country_codes" ;
  if (! -e $path_csv_country_codes) { abort ("Input file $path_csv_country_codes not found!") ; }

  open CSV_COUNTRY_CODES, '<', $path_csv_country_codes ;
  $country_names {"--"} = "Unknown" ;
  while ($line = <CSV_COUNTRY_CODES>)
  {
    chomp $line ;

    next if $line =~ /^#/ ;

    ($country_code,$region_code,$north_south_code,$country_name) = split (',', $line,4) ;

    $region_codes      {$country_code} = $region_code ;
    $north_south_codes {$country_code} = $north_south_code ;

    $country_name =~ s/"//g ;

    next if $country_name eq "Anonymous Proxy" ;
    next if $country_name eq "Satellite Provider" ;
    next if $country_name eq "Other Country" ;
    next if $country_name eq "Asia/Pacific Region" ;
    next if $country_name eq "Europe" ;

    $country_names     {$country_code} = $country_name ;
    $country_names     {'ZZ'}       = 'World' ;
    $country_codes_all {"$country_name|$country_code"} ++ ;
    # print "$country_code: $country_name\n" ;
  }
}

sub ReadMonthlySales
{
  my $file_csv_in = shift ;

  open CSV_IN,  '<', $file_csv_in  || die "File $file_csv_in not found!" ;

  $lines = 0 ;
  while ($line = <CSV_IN>)
  {
    chomp $line ;
    $line =~ s/\x0D.*$// ;
    ($month, $time, $count, $price, $country) = split (',', $line) ;
    $month = substr ($month,0,7) ;

    next if $month eq '' ;

    if ($country !~ /^[A-Z]+$/)
    { print "Ignore country code $country\n" ; next ; }

    if ($lines++ == 0)
    {
      $months_prev {$month} = $month_prev ;
      $month_prev = $month ;
      $months {$month} ++ ;
    }

    $copies_per_country_per_month {"$month,$country"} += $count ;
    $copies_per_country_per_month {"$month,ZZ"}       += $count ;

    $sales_per_country_per_month  {"$month,$country"} += $price ;
    $sales_per_country_per_month  {"$month,ZZ"}       += $price ;

    $sales_per_country                     {$country} += $price ;
    $sales_per_country                     {'ZZ'}     += $price ;

    $countries {$country} ++ ;
  }
}

sub ProcessMonthlySales
{
  foreach $month (sort {$b cmp $a} keys %months)
  {
    $month_prev = $months_prev {$month} ;
    $line_csv = $month ;
    foreach $country (sort {$sales_per_country {$b} <=> $sales_per_country {$a}} keys %sales_per_country)
    {

      $copies = $copies_per_country_per_month {"$month,$country"} ;
      $sales  = $sales_per_country_per_month  {"$month,$country"} ;
      $avg_price = '..' ;
      if ($copies > 0)
      { $avg_price = sprintf ("%.2f", $sales / $copies) ; }

      $inc_sales = '' ;
      $inc_price = '' ;
      if ($month_prev ne '')
      {
        $copies_prev = $copies_per_country_per_month {"$month_prev,$country"} ;
        $sales_prev  = $sales_per_country_per_month  {"$month_prev,$country"} ;
        $avg_price_prev = '..' ;
        if ($copies_prev > 0)
        { $avg_price_prev = sprintf ("%.2f", $sales_prev / $copies_prev) ; }

        if ($sales_prev > 0)
        { $inc_sales = sprintf ("%.0f", 100 * ($sales / $sales_prev) - 100) . '%' ; }
        if ($avg_price_prev > 0)
        { $inc_price = sprintf ("%.0f", 100 * ($avg_price/ $avg_price_prev) - 100) . '%' ; }
      }

      $share_copies = sprintf ("%.1f", (100 * $copies) / $copies_per_country_per_month {"$month,ZZ"}) ;
      $share_sales  = sprintf ("%.1f", (100 * $sales)  / $sales_per_country_per_month  {"$month,ZZ"}) ;

      if ($share_copies >= 3)
      { $share_copies = sprintf ("%.0f", $share_copies) ; }
      if ($share_sales >= 3)
      { $share_sales  = sprintf ("%.0f", $share_sales) ; }

      $sales = sprintf ("%.0f", $sales) ;
      if ($copies == 0)
      { $metrics_monthly {"$month,$country"} = ",,,,,," ; }
      else
      { $metrics_monthly {"$month,$country"} = "$copies,$share_copies\%,$sales,$share_sales\%,$inc_sales,$avg_price,$inc_price" ; }
    }
  }
}

sub WriteMonthlySales
{
  my ($file_csv_out_countries_hor, $file_csv_out_countries_ver, $file_csv_out_plot_books) = @_ ;

  open CSV_OUT, '>', $file_csv_out_countries_hor || die "File $file_csv_out_countries_hor could not be opened!" ;

  $line_csv   = "" ;
  $line_csv2  = "" ;
  foreach $country_code (sort {$sales_per_country {$b} <=> $sales_per_country {$a}} keys %sales_per_country)
  {
    $country_name = $country_names {$country_code} ;
    if ($country_code eq 'ZZ')
    { $line_csv  .= ",$country_name,,,," ; }
    else
    { $line_csv  .= ",$country_name ($country_code),,,," ; }
    $line_csv2 .= ",books,share,revenue,share,growth,avg price,rise" ;
  }

  print         "$line_csv\n" ;
  print CSV_OUT "$line_csv\n" ;
  print         "$line_csv2\n" ;
  print CSV_OUT "$line_csv2\n" ;

  foreach $month (sort {$a cmp $b} keys %months)
  {
    $line_csv = "$month" ;
    foreach $country (sort {$sales_per_country {$b} <=> $sales_per_country {$a}} keys %sales_per_country)
    { $line_csv .= ',' . $metrics_monthly {"$month,$country"} ; }
    print         "$line_csv\n" ;
    print CSV_OUT "$line_csv\n" ;
  }

  close CSV_OUT ;

 # ----------------------------------------------------------------------------------

  open CSV_OUT, '>', $file_csv_out_countries_ver || die "File $file_csv_out_countries_ver could not be opened!" ;

  $line_csv   = "" ;
  foreach $country_code (sort {$sales_per_country {$b} <=> $sales_per_country {$a}} keys %sales_per_country)
  {
    $country_name = $country_names {$country_code} ;
    if ($country_code eq 'ZZ')
    { $line_csv  .= ",$country_name\n" ; }
    else
    { $line_csv     = ",$country_name ($country_code)\n" ; }
    print          $line_csv ;
    print CSV_OUT  $line_csv ;

    $line_csv     = ",books,share,revenue,share,growth,avg price,rise\n" ;
    print          $line_csv ;
    print CSV_OUT  $line_csv ;

    foreach $month (sort {$a cmp $b} keys %months)
    {
      $line_csv = "$month," . $metrics_monthly {"$month,$country_code"} . "\n";
      print          $line_csv ;
      print CSV_OUT  $line_csv ;
    }

    print          "\n" ;
    print CSV_OUT  "\n" ;
  }

  close CSV_OUT ;

 # ----------------------------------------------------------------------------------

  open CSV_OUT, '>', $file_csv_out_plot_books || die "File $file_csv_out_plot_books could not be opened!" ;

  $line_csv   = "" ;
  foreach $country_code (sort {$sales_per_country {$b} <=> $sales_per_country {$a}} keys %sales_per_country)
  {
    $country_name = $country_names {$country_code} ;
    $line_csv  .= ",$country_name" ;
  }
  print          "$line_csv\n" ;
  print CSV_OUT  "$line_csv\n" ;

  foreach $month (sort {$a cmp $b} keys %months)
  {
    $line_csv   = "$month" ;
    foreach $country_code (sort {$sales_per_country {$b} <=> $sales_per_country {$a}} keys %sales_per_country)
    { $line_csv .= ',' . $copies_per_country_per_month  {"$month,$country_code"} ; }
    print          "$line_csv\n" ;
    print CSV_OUT  "$line_csv\n" ;
  }

  close CSV_OUT ;

}


