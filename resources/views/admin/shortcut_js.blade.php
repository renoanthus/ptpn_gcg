<script type="text/javascript">
    $(document).on('change', '#f_wilayah_id', function() {
        var id = $('#f_wilayah_id option:selected').val();
        $("#f_kebun_id").empty();
        $.ajax({
            url : "{{ url('api/wilayah') }}/"+id,
            type : "GET",
            datatype : "JSON",
            success : function(data){
                $('#f_kebun_id').append(`<option value="">Pilih Kebun</option>`)
                $.each(data.data, function(index, val) {
                        $('#f_kebun_id').append(`<option value="`+val.id+`">`+val.nama+`</option>`)
                });
            }
        });
    });
    $(document).on('change', '#f_kebun_id', function() {
        var id = $('#f_kebun_id option:selected').val();
        $("#f_afdeling_id").empty();
        $.ajax({
            url : "{{ url('api/kebun') }}/"+id,
            type : "GET",
            datatype : "JSON",
            success : function(data){
                $('#f_afdeling_id').append(`<option value="">Pilih Afdeling</option>`)
                $.each(data.data, function(index, val) {
                        $('#f_afdeling_id').append(`<option value="`+val.id+`">`+val.nama+`</option>`)
                });
            }
        });
    });
    $(document).on('change', '#f_afdeling_id', function() {
        var id = $('#f_afdeling_id option:selected').val();
        $("#f_blok_id").empty();
        $.ajax({
            url : "{{ url('api/afdeling') }}/"+id,
            type : "GET",
            datatype : "JSON",
            success : function(data){
                $('#f_blok_id').append(`<option value="">Pilih Blok</option>`)
                $.each(data.data, function(index, val) {
                        $('#f_blok_id').append(`<option value="`+val.id+`">`+val.nama+`</option>`)
                });
            }
        });
    });
</script>