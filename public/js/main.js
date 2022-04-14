$(document).ready(function () {
    $('button[name="clear"]').click(function (e) {
        e.preventDefault();
        $(':input').not('input[name="_token"]').val('')
    });

    $('form[name="add-event"] #name, form[name="add-event"] #year, form[name="add-event"] #edition').change(function (e) {
        let name = $('form[name="add-event"] #name').val();

        if (name != '') {
            name = `/${name}`;
            name = name.trim();
            name = name.normalize('NFD');
            name = name.replace(/[\u0300-\u036f]/g, "");
            name = name.replace(/ {2,}/g, ' ');
            name = name.replace(/\s/g, '-');
        }

        let year = $('form[name="add-event"] #year').val();

        if (year != '') {
            year = `/${year}`;
            year = year.trim();
            year = year.normalize('NFD');
            year = year.replace(/[\u0300-\u036f]/g, "");
            year = year.replace(/ {2,}/g, ' ');
            year = year.replace(/\s/g, '-');
        }

        let edition = $('form[name="add-event"] #edition').val();

        if (edition != '') {
            edition = `/${edition}`;
            edition = edition.trim();
            edition = edition.normalize('NFD');
            edition = edition.replace(/[\u0300-\u036f]/g, "");
            edition = edition.replace(/ {2,}/g, ' ');
            edition = edition.replace(/\s/g, '-');
        }

        $('form[name="add-event"] #slug').val(name+""+year+""+edition)
    });

    $('form[name="add-event"] #start_date').change(function (e) {
        $('form[name="add-event"] #end_date').val($(this).val())
    });
});

