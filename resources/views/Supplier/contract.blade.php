<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Perjanjian Jual Beli</title>
  <style>
    /* *{
        border: red 1px solid;
    } */
    body {
      font-family: 'Times New Roman', serif;
      margin: 20px;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .section {
      margin-bottom: 10px;
    }

    .section h2 {
      margin-bottom: 5px;
    }

    .parties {
      display: flex;
      justify-content: space-between;
    }

    .party {
      flex: 1;
    }

    .content {
      text-align: justify;
    }

    .tg  {
      border-collapse: collapse;
      border-spacing: 0;
    }

    .tg td {
      border-style: solid;
      border-width: 0px;
      font-family: Arial, sans-serif;
      font-size: 14px;
      overflow: hidden;
      padding: 10px 5px;
      word-break: normal;
    }

    .tg th {
      border-style: solid;
      border-width: 0px;
      font-family: Arial, sans-serif;
      font-size: 14px;
      font-weight: normal;
      overflow: hidden;
      padding: 10px 5px;
      word-break: normal;
    }

    .tg .tg-0pky {
      border-color: inherit;
      text-align: left;
      vertical-align: top;
    }

    table.tx {
      border-collapse: collapse;
      width: 100%;
    }

    th.tx-8toh, td.tx-pjk6 {
      border: 1px solid black;
      text-align: center;
      padding: 8px;
    }

    th.tx-8toh {
      background-color: #f2f2f2;
    }

    .signatures {
      display: flex;
      justify-content: space-around;
    }

    .inner-div {
      width: 21%;
      /* border: 1px solid #ccc; */
      padding: 10px;
      box-sizing: border-box;
      text-align: center;
    }

    .inner-div img {
      display: block;
      margin: 0 auto; /* Tengahkan gambar */
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>SURAT PERJANJIAN JUAL BELI</h1>
      <p>PLATFORM BHAVANA</p>
    </div>
    <hr>

    <div class="section">
      <div class="parties">
        <div class="party">
          <p style="margin-bottom: 2rem;">Yang bertandatangan dibawah ini:</p>
          <table class="tg">
            <thead>
              <tr>
                <th class="tg-0pky">Nama Penyedia</th>
                <th class="tg-0pky">:</th>
                <th class="tg-0pky">{{ $results->Nama}}</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="tg-0pky">Alamat</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky">{{ $results->Alamat}}</td>
              </tr>
              <tr>
                <td class="tg-0pky">No Telp</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky">{{ $results->No_Telp}}</td>
              </tr>
            </tbody>
          </table>
          <p>Dalam hal ini bertindak sebagai <span style="font-weight: bold">PIHAK PERTAMA</span></p>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="parties">
        <div class="party">
          <table class="tg">
            <thead>
              <tr>
                <th class="tg-0pky">Nama Pembeli*</th>
                <th class="tg-0pky">:</th>
                <th class="tg-0pky">Bhavana</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="tg-0pky">Alamat</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky">Depok, Jl. M. Rajawali, 16424</td>
              </tr>
              <tr>
                <td class="tg-0pky">No Telp</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky">(+62) 993-987-2343</td>
              </tr>
            </tbody>
          </table>
          <p>Dalam hal ini bertindak sebagai <span style="font-weight: bold">PIHAK KEDUA</span></p>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="content">
        <p>Kedua belah pihak dengan ini menerangkan bahwa <span style="font-weight: bold">PIHAK PERTAMA</span> selaku pemilik sah telah setuju untuk menjual kepada <span style="font-weight: bold">PIHAK KEDUA</span> berupa: </p>

        <table class="tx">
          <thead>
            <tr>
              <th class="tx-8toh">No</th>
              <th class="tx-8toh">Nama Kategori</th>
              <th class="tx-8toh">Jenis Kategori</th>
              <th class="tx-8toh">Kode Jenis</th>
              <th class="tx-8toh">QTY</th>
              <th class="tx-8toh">Total Harga</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="tx-pjk6">1</td>
              <td class="tx-pjk6">{{ $results->Nama_Kategori}}</td>
              <td class="tx-pjk6">{{ $results->Nama_Jenis }}</td>
              <td class="tx-pjk6">{{ $results->Kode_Jenis }}</td>
              <td class="tx-pjk6">{{ $results->QTY }} Liter</td>
              <td class="tx-pjk6">Rp. {{ number_format($results->Harpok_Barang * $results->QTY) }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="section">
      <div class="content">
        <p>Yakni <span style="font-weight: bold">{{ $results->Nama_Kategori}}</span> dengan kategori <span style="font-weight: bold">{{ $results->Nama_Jenis }}</span> dengan kode jenis <span style="font-weight: bold">{{ $results->Kode_Jenis }}</span> berjumlah <span style="font-weight: bold">{{ $results->QTY }} LITER</span> dengan HARGA TOTAL <span style="font-weight: bold">Rp. {{ number_format($results->Harpok_Barang * $results->QTY) }}</span> secara tunai.</p>

        <p>Selanjutnya kedua belah pihak bersepakat bahwa perjanjian penjualan <span style="font-weight: bold">PIHAK PERTAMA</span> dengan <span style="font-weight: bold">PIHAK KEDUA</span> berlaku sejak penandatanganan surat perjanjian ini.</p>
      </div>
    </div>

    <div class="section">
      <div class="signatures">
        <div class="inner-div">
            <h4 style="text-align: center; margin-bottom: 3rem;">Pihak Pertama,</h4>
            <p style="text-align: end; margin-bottom: 1rem;">Materai*</p>
            <p><hr></p>
            ..........................
          </div>
        
          <div class="inner-div">
            <h4 style="text-align: center; margin-bottom: 1rem;">Pihak Kedua,</h4>
            <img width="70px" height="40px" src="https://i.postimg.cc/gjj6R1DG/signature-1.png" alt="">
            <p><hr></p>
            <p style="text-align: center;">Bhavana</p>
          </div>
      </div>
    </div>
  </div>
</body>
</html>
