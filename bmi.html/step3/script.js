
 

 $(document).ready(function() {
    if (height > 3) {
        $('#result').html(
            '<div class="alert alert-warning">الطول يجب أن يكون بالمتر (مثال: 1.75)</div>'
        );
        return;
    }
    $('#bmiform').submit(function(e) {
        e.preventDefault();
        var name = $('#name').val().trim();
        var weight = parseFloat($('#weight').val());
        var height = parseFloat($('#height').val());

        if (name === "" ||isNaN(weigth) || isNaN(height) ||weigth<= 0 || height <= 0) {
            $('#result').html('<div class="alert alert-warning">الرجاء إدخال قيم صحيحة.</div>');
            return;
        }
        if (height > 3) {
            $('#result').html(  '<div class="alert alert-warning">يجب أن يكون الطول بالمتر(مثال:1.75)</div>'
                       );
                          return;
                                 }
        $.ajax({
            url: 'calculate.php',
            type: 'POST',
            data: { name: name, weight: weight, height: height },
            dataType: 'json',
            success: function(response) {
                var alertClass = response.success ? 'alert-success' : 'alert-danger';
                $('#result').html('<div class="alert ' + alertClass + '">' + response.message + '</div>');
            },
            error: function() {
                $('#result').html('<div class="alert alert-danger">خطأ في الخادم.</div>');
            }
              });
    });
})
