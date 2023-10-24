<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->


<div class="card">
    <div class="card-header">
        <h4> Select One Table</h4>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btn_tambahdata" data-backdrop="static">
            Tambah Data
        </button>

    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered" id="table-artikel">
            <thead>
                <tr>
                    <th> No. </th>
                    <th> Url</th>
                    <th> Slug </th>
                    <th> Title </th>
                    <th> Tanggal Posting </th>
                    <th> Aksi </th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div><!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="formartikel">
                    <?php foreach ($format_artikel as $kolom) :
                        if ($kolom->type == "RST") :  ?>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"> <?= $kolom->name; ?></span>
                                <input type="text" name="<?= $kolom->code ?>" id="<?= $kolom->code ?>" class="form-control" placeholder="<?= $kolom->name ?>" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                        <?php endif; ?>
                        <?php if ($kolom->type == "summernote") :  ?>
                            <span class="input-group-text" id="addon-wrapping"> <?= $kolom->name; ?></span>
                            <textarea id="summernote" name="<?= $kolom->code ?>"></textarea>
                        <?php endif; ?>
                        <?php if ($kolom->type == "RSH") : ?>
                            <input type="hidden" name="<?= $kolom->code ?>" id="<?= $kolom->code ?>">
                        <?php endif; ?>
                        <?php if ($kolom->type == "date") : ?>
                            <input type="hidden" name="<?= $kolom->code ?>" value="<?= date('Y-m-d'); ?>">
                        <?php endif; ?>
                        <?php if ($kolom->type == "images") : ?>
                            <input type="file" name="<?= $kolom->code ?>" id="<?= $kolom->code ?>">
                        <?php endif; ?>
                    <?php endforeach; ?> <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->

<script type="text/javascript">
    $(document).ready(function() {

        $('#formartikel').submit(function(e) {
            e.preventDefault();
            var dataForm = $('#formartikel').serialize();
            $.ajax({
                url: "<?= base_url('datatables/addArtikel') ?>",
                data: dataForm,
                enctype: 'multipart/form-data',
                method: "post",
                type: "json",
                processData: false,
                contentType: false,
                success: function(response) {
                    var result = jQuery.parseJSON(response);
                    console.log(result);
                }
            })

        })
        $('#btn_tambahdata').click(function(e) {
            e.preventDefault();
            $('#exampleModal').modal('show');
        })
        $('.btn-close').click(function(e) {
            e.preventDefault();
            $('#exampleModal').modal('hide');
        })
        $('#summernote').summernote();
        var tabel = null;
        $(document).ready(function() {
            tabel = $('#table-artikel').DataTable({
                "processing": true,
                "responsive": true,
                "serverSide": true,
                "ordering": true, // Set true agar bisa di sorting
                "order": [
                    [0, 'asc']
                ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
                "ajax": {
                    "url": "<?= base_url('datatables/view_data'); ?>", // URL file untuk proses select datanya
                    "type": "POST"
                },
                "deferRender": true,
                "aLengthMenu": [
                    [5, 10, 50],
                    [5, 10, 50]
                ], // Combobox Limit
                "columns": [{
                        "data": 'id',
                        "sortable": false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        "data": "url"
                    }, // Tampilkan judul
                    {
                        "data": "slug"
                    }, // Tampilkan kategori
                    {
                        "data": "title"
                    }, // Tampilkan penulis
                    {
                        "data": "date"
                    }, // Tampilkan tgl posting
                    {
                        "data": "id",
                        "render": function(data, type, row, meta) {
                            return '<a href="show/' + data + '">Show</a>';
                        }
                    },
                ],
            });
        });
    })
</script>