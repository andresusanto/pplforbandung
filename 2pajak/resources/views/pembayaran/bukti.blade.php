@extends('wp.layout_user')
@section('title') Pembayaran Pajak - Rumah Pajak @stop
@section('content')

<?php
  function to_rupiah($cur)
  {
     return "Rp".number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $cur)),2, ',', '.');
  }
?>

<center>
<h3>Bukti Pembayaran Pajak</h3>
<h4>Surat Tanda Terima Setoran (STTS)</h4>
</center>

<table class='table borderless'>
  <tbody>
    <tr>
      <td width='200'>NPWPD</td>
      <td width='10'>:</td>
      <td> {{ $bukti['npwpd'] }} </td>
    </tr>
    <tr>
      <td width='200'>Jenis Pajak</td>
      <td width='10'>:</td>
      <td> {{ $bukti['jenis_pajak'] }} </td>
    </tr>
    <tr>
      <td width='200'>Nomor STP</td>
      <td width='10'>:</td>
      <td> {{ $bukti['nomor_stp'] }} </td>
    </tr>
    <tr>
      <td width='200'>Sejumlah</td>
      <td width='10'>:</td>
      <td> {{ to_rupiah($bukti['jumlah_pembayaran'])}} </td>
    </tr>
    <tr>
      <td width='200'>Masa Pajak</td>
      <td width='10'>:</td>
      <td> {{ $bukti['masa_pajak'] }} </td>
    </tr>
    <tr>
      <td width='200'>Tanggal Pembayaran</td>
      <td width='10'>:</td>
      <td> {{ $bukti['tanggal_pembayaran'] }} </td>
    </tr>
    <tr>
      <td width='200'>Status Pembayaran</td>
      <td width='10'>:</td>
      <td> {{ $bukti['status_pembayaran'] }} </td>
    </tr>
  </tbody>
</table>

@stop