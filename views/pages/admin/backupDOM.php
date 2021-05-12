
        <script src="public/assets/libs/jquery/dist/jquery.min.js"></script>
        <?php if ($row->kategori_buku == 1) : ?>
            <script>
            $(document).ready(function() {
                $('#optionBukuEdit<?=$nomor?>').change(function() {
                    $('#kategKlasifikasiEdit<?=$nomor?>').remove();
                    if ($('#optionBukuEdit<?=$nomor?>').val() == '0') {
                        $.get('views/pages/admin/kateg_khus_edit1.php', {
                            id_buku: <?= $row->id_buku; ?>,
                            nomor_jenis_buku: <?=$nomor?>,
                            optionBukuEdit: $('#optionBukuEdit<?=$nomor?>').val()
                        })
                        .done(function(data) {
                            $('#formBukuEdit<?=$nomor?>').after(data);
                        })
                    }
                });

                $('#optionBukuEdit<?=$nomor?>').change(function() {
                    $('#kategKhususEdit<?=$nomor?>').remove();
                    if ($('#optionBukuEdit<?=$nomor?>').val() == '1') {
                        $.get('views/pages/admin/kateg_klasif_edit2.php', {
                            id_buku: <?= $row->id_buku; ?>,
                            nomor_jenis_buku: <?=$nomor?>,
                            optionBukuEdit: $('#optionBukuEdit<?=$nomor?>').val()
                        })
                        .done(function(data) {
                            $('#formBukuEdit<?=$nomor?>').after(data);
                        })
                    }
                });
            });
            </script>
        <?php else : ?>
            <script>
                $('#optionBukuEdit<?=$nomor?>').show(function() {
                    if ($('#optionBukuEdit<?=$nomor?>').val() == '0') {
                        // $(this).show(function() {
                        $('#kategKlasifikasiEdit<?=$nomor?>').remove();
                        const html = `<div class="form-group mt-3" id="kategKhususEdit<?=$nomor?>">
                                        <label>Jenis Buku</label>
                                        <select class="form-control" name="jenis_buku<?=$nomor?>" style="width: 100%;">
                                            <option hidden>Pilih Jenis Buku</option>
                                            <?php
                                            $queryKategK = $mysqli->prepare("SELECT * FROM mapel");
                                            $queryKategK->execute();
                                            $resultKategK = $queryKategK->get_result();
                                            while ($rowKategK = $resultKategK->fetch_object()) {
                                                if ($rowKategK->id_mapel == $row->jenis_buku) {
                                                    echo "
                                                            <option value='{$rowKategK->id_mapel}' selected>{$rowKategK->nama_mapel}</option>
                                                        ";
                                                } else {
                                                    echo "
                                                            <option value='{$rowKategK->id_mapel}'>{$rowKategK->nama_mapel}</option>
                                                        ";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>`;

                        $('#formBukuEdit<?=$nomor?>').append(html);
                        // });
                    }
                });

                $('#optionBukuEdit<?=$nomor?>').change(function() {
                    if ($('#optionBukuEdit<?=$nomor?>').val() == '1') {
                        // $(this).show(function() {
                        $('#kategKhususEdit<?=$nomor?>').remove();
                        const html = `<div class="form-group mt-3" id="kategKlasifikasiEdit<?=$nomor?>">
                                        <label>Jenis Buku</label>
                                        <select class="form-control" name="jenis_buku<?=$nomor?>" style="width: 100%;">
                                            <option hidden>Pilih Jenis Buku</option>
                                            <?php
                                            $queryKategK = $mysqli->prepare("SELECT * FROM mapel WHERE klasifikasi=1");
                                            $queryKategK->execute();
                                            $resultKategK = $queryKategK->get_result();
                                            while ($rowKategK = $resultKategK->fetch_object()) {
                                                echo "
                                                        <option value='{$rowKategK->id_mapel}'>{$rowKategK->nama_mapel}</option>
                                                    ";
                                            }
                                            ?>
                                        </select>
                                    </div>`;
                        $('#formBukuEdit<?=$nomor?>').append(html);
                        // });
                    }
                });

                $('#optionBukuEdit<?=$nomor?>').change(function() {
                    if ($('#optionBukuEdit<?=$nomor?>').val() == '0') {
                        // $(this).show(function() {
                        $('#kategKlasifikasiEdit<?=$nomor?>').remove();
                        const html = `<div class="form-group mt-3" id="kategKhususEdit<?=$nomor?>">
                                        <label>Jenis Buku</label>
                                        <select class="form-control" name="jenis_buku<?=$nomor?>" style="width: 100%;">
                                            <option hidden>Pilih Jenis Buku</option>
                                            <?php
                                            $queryKategK = $mysqli->prepare("SELECT * FROM mapel");
                                            $queryKategK->execute();
                                            $resultKategK = $queryKategK->get_result();
                                            while ($rowKategK = $resultKategK->fetch_object()) {
                                                if ($rowKategK->id_mapel == $row->jenis_buku) {
                                                    echo "
                                                            <option value='{$rowKategK->id_mapel}' selected>{$rowKategK->nama_mapel}</option>
                                                        ";
                                                } else {
                                                    echo "
                                                            <option value='{$rowKategK->id_mapel}'>{$rowKategK->nama_mapel}</option>
                                                        ";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>`;
                        $('#formBukuEdit<?=$nomor?>').append(html);
                        // });
                    }
                });
            </script>
        <?php endif; ?>