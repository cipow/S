<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>S KOS API</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/3.1.0/octicons.min.css">

  </head>
  <body>

    <div class="jumbotron">
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <h1>S KOS API Route</h1>
        </div>
        <div class="col-sm-2"></div>
      </div>

    </div>

    <!-- ALL OWNERS -->
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><b>ALL OWNERS</b></div>
          <div class="panel-body">
            <p>dapatkan semua pemilik kos</p>
          </div>

          <!-- Table -->
          <table class="table">
            <thead>
              <tr>
                <th>METHOD</th>
                <th>ROUTE</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>GET</td>
                <td>/api/owners</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>

    <!-- OWNERS -->
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><b>OWNERS</b></div>
          <div class="panel-body">
            <p>dapatkan informasi pemilik kos</p>
          </div>

          <!-- Table -->
          <table class="table">
            <thead>
              <tr>
                <th>METHOD</th>
                <th>ROUTE</th>
                <th>HEADER</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>GET</td>
                <td>/api/owners</td>
                <td>Authorization = API_TOKEN</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>

    <!-- CREATE OWNER -->
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><b>CREATE OWNER</b></div>
          <div class="panel-body">
            <p>baut akun baru pemilik kos</p>
          </div>

          <!-- Table -->
          <table class="table">
            <thead>
              <tr>
                <th>METHOD</th>
                <th>ROUTE</th>
                <th>BODY</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>POST</td>
                <td>/api/owners</td>
                <td>
                  username(text)<br>password(text)<br>telepon(text)<br>
                  nama(text)<br>alamat(text)
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>

    <!-- AUTH -->
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><b>AUTHORIZATION</b></div>
          <div class="panel-body">
            <p>Authentication login untuk mendapatkan API_TOKEN</p>
          </div>

          <!-- Table -->
          <table class="table">
            <thead>
              <tr>
                <th>METHOD</th>
                <th>ROUTE</th>
                <th>BODY</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>POST</td>
                <td>/api/owners/auth</td>
                <td>
                  username(text)<br>password(text)
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>

    <!-- UPDATE PROFIL OWNER -->
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><b>UPDATE PROFIL OWNER</b></div>
          <div class="panel-body">
            <p>update informasi pemilik kos</p>
          </div>

          <!-- Table -->
          <table class="table">
            <thead>
              <tr>
                <th>METHOD</th>
                <th>ROUTE</th>
                <th>BODY</th>
                <th>HEADERS</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>PUT</td>
                <td>/api/owners</td>
                <td>
                  nama(text)<br>telepon(text)<br>
                  alamat(text)<br>nama_kos(text)<br>
                  lain_lain(text)
                </td>
                <td>
                  Content-Type = application/json <br>
                  Authorization = API_TOKEN
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>

    <!-- UPDATE PROFIL IMAGE OWNER -->
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><b>UPDATE PROFIL IMAGE OWNER</b></div>
          <div class="panel-body">
            <p>update foto profil pemilik kos</p>
          </div>

          <!-- Table -->
          <table class="table">
            <thead>
              <tr>
                <th>METHOD</th>
                <th>ROUTE</th>
                <th>BODY</th>
                <th>HEADERS</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>POST</td>
                <td>/api/owners/foto</td>
                <td>
                  foto(file)
                </td>
                <td>
                  Authorization = API_TOKEN
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>

    <!-- UPDATE GEOLOCATION OWNER -->
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><b>UPDATE GEOLOCATION OWNER</b></div>
          <div class="panel-body">
            <p>update lokasi geografi untuk maps pemilik kos</p>
          </div>

          <!-- Table -->
          <table class="table">
            <thead>
              <tr>
                <th>METHOD</th>
                <th>ROUTE</th>
                <th>BODY</th>
                <th>HEADERS</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>PUT</td>
                <td>/api/owners/geo</td>
                <td>
                  geo(text)
                </td>
                <td>
                  Content-Type = application/json <br>
                  Authorization = API_TOKEN
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>

    <!-- OWNER GET KAMAR -->
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><b>OWNER GET KAMAR</b></div>
          <div class="panel-body">
            <p>mengambil daftar kamar pemilik kos</p>
          </div>

          <!-- Table -->
          <table class="table">
            <thead>
              <tr>
                <th>METHOD</th>
                <th>ROUTE</th>
                <th>HEADERS</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>GET</td>
                <td>/api/owners/kamars</td>
                <td>
                  Authorization = API_TOKEN
                </td>
              </tr>
              <tr>
                <td>GET</td>
                <td>/api/owners/kamars/{id kamar}</td>
                <td>
                  Authorization = API_TOKEN
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>

    <!-- OWNER ADD KAMAR -->
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><b>OWNER ADD KAMAR</b></div>
          <div class="panel-body">
            <p>pemilik kos menambah kamar</p>
          </div>

          <!-- Table -->
          <table class="table">
            <thead>
              <tr>
                <th>METHOD</th>
                <th>ROUTE</th>
                <th>BODY</th>
                <th>HEADERS</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>POST</td>
                <td>/api/owners/kamars</td>
                <td>
                  cover(file)<br>tipe(text)<br>jenis(text)<br>
                  harga(text)<br>jumlah(text)<br>fasilitas(text)
                </td>
                <td>
                  Authorization = API_TOKEN
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>

    <!-- OWNER UPDATE KAMAR INFO -->
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><b>OWNER UPDATE KAMAR INFO</b></div>
          <div class="panel-body">
            <p>update informasi kamar</p>
          </div>

          <!-- Table -->
          <table class="table">
            <thead>
              <tr>
                <th>METHOD</th>
                <th>ROUTE</th>
                <th>BODY</th>
                <th>HEADERS</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>PUT</td>
                <td>/api/owners/kamars/{id kamar}</td>
                <td>
                  tipe(text)<br>jenis(text)<br>
                  harga(text)<br>fasilitas(text)
                </td>
                <td>
                  Content-Type = application/json <br>
                  Authorization = API_TOKEN
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>

    <!-- OWNER UPDATE KAMAR COVER -->
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><b>OWNER UPDATE KAMAR COVER</b></div>
          <div class="panel-body">
            <p>update cover kamar</p>
          </div>

          <!-- Table -->
          <table class="table">
            <thead>
              <tr>
                <th>METHOD</th>
                <th>ROUTE</th>
                <th>BODY</th>
                <th>HEADERS</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>POST</td>
                <td>/api/owners/kamars/cover/{id kamar}</td>
                <td>
                  cover(file)
                </td>
                <td>
                  Authorization = API_TOKEN
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>

    <!-- OWNER UPDATE KAMAR JUMLAH -->
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><b>OWNER UPDATE KAMAR JUMLAH</b></div>
          <div class="panel-body">
            <p>update informasi jumlah kamar tersisa</p>
          </div>

          <!-- Table -->
          <table class="table">
            <thead>
              <tr>
                <th>METHOD</th>
                <th>ROUTE</th>
                <th>BODY</th>
                <th>HEADERS</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>PUT</td>
                <td>/api/owners/kamars/jumlah/{id kamar}</td>
                <td>
                  jumlah(text)
                </td>
                <td>
                  Content-Type = application/json <br>
                  Authorization = API_TOKEN
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>

    <!-- OWNER DELETE KAMAR -->
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><b>OWNER DELETE KAMAR</b></div>
          <div class="panel-body">
            <p>hapus kamar</p>
          </div>

          <!-- Table -->
          <table class="table">
            <thead>
              <tr>
                <th>METHOD</th>
                <th>ROUTE</th>
                <th>HEADERS</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>DELETE</td>
                <td>/api/owners/kamars/{id kamar}</td>
                <td>
                  Authorization = API_TOKEN
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>

    <!-- GET ALL KAMARS -->
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><b>GET ALL KAMARS</b></div>
          <div class="panel-body">
            <p>dapatkan semua kamar</p>
          </div>

          <!-- Table -->
          <table class="table">
            <thead>
              <tr>
                <th>METHOD</th>
                <th>ROUTE</th>
                <th>PARAMETER</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>GET</td>
                <td>/api/kamars</td>
                <td>
                  (optional)<br>
                  harga = number <br>
                  sisa = 1
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>

    <!-- ADD PREVIEW KAMAR -->
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><b>ADD PREVIEW KAMAR</b></div>
          <div class="panel-body">
            <p>menambahkan gambar preview untuk kamar</p>
          </div>

          <!-- Table -->
          <table class="table">
            <thead>
              <tr>
                <th>METHOD</th>
                <th>ROUTE</th>
                <th>BODY</th>
                <th>HEADERS</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>POST</td>
                <td>/api/kamars/{id kamar}</td>
                <td>preview(file)</td>
                <td>
                  Authorization = API_TOKEN
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>

    <!-- DELETE PREVIEW KAMAR -->
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><b>DELETE PREVIEW KAMAR</b></div>
          <div class="panel-body">
            <p>hapus preview kamar</p>
          </div>

          <!-- Table -->
          <table class="table">
            <thead>
              <tr>
                <th>METHOD</th>
                <th>ROUTE</th>
                <th>HEADERS</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>DELETE</td>
                <td>/api/kamars/{id preview}</td>
                <td>
                  Authorization = API_TOKEN
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
