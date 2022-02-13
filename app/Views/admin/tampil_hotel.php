<?=$this->extend('template/layout')?>
<?=$this->section('content')?>
  <div class="table-responsive">
      <table class="table table-striped text-center">
          <tr class="bg-success">
            <th>ID</th>
            <th>Nama Kamar</th>
            <th>Deskripsi</th>
            <th>Tipe Kamar</th>
            <th>Harga Kamar</th>
            <th>Status</th>
            <th>Fasilitas</th>
            <th>Gambar</th>
            <th>Dibuat</th>
            <th>Diupdate</th>
            <th>Aksi</th>
          </tr>
          <?php foreach($kamar as $kmr):?>
          <tr>
              <td><?=$kmr['id_kamar']?></td>
              <td><?=$kmr['nama_kamar']?></td>
              <td><?=$kmr['deskripsi']?></td>
              <td><?=$kmr['tipe_kamar']?></td>
              <td><?=$kmr['harga_kamar']?></td>
              <td><?=$kmr['status']?></td>
              <td><?=$kmr['fasilitas']?></td>
              <td><img src="<?="images/" . $kmr['gambar']?>" style="height:100px;"></td>
              <td><?=$kmr['created_at']?></td>
              <td><?=$kmr['updated_at']?></td>
              <td><a href="/kamar/<?=$kmr['id_kamar']?>/edit">EDIT</a>|<a href="/kamar/<?=$kmr['id_kamar']?>/delete" onclick="return confirm('Apakah Anda Yakin')">DELETE</a></td>
          </tr>
          <?php endforeach?>
      </table>
  </div>
<?=$this->endSection()?>