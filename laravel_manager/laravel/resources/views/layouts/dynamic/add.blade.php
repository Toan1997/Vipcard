<?php
$affiliates = App\Models\VipcardAffiliate::all();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laravel - Dynamically Add or Remove input fields using JQuery</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>


<div class="container">
    <h2 align="center">Dynamic Row Linked Management</h2>
    <div class="form-group">
        <form name="add_name" id="add_name">
                <input type="hidden" name="id" id="input-name" class="form-control" value="{{ request()->route('id') }}" />
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>


            <div class="alert alert-success print-success-msg" style="display:none">
                <ul></ul>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush" id="dynamic_field">
                    <tr>
                        <td>
                            <div id="select-affiliate-dropdown">
                                <select class="form-control name_list" name="affiliate[]">
                                    @foreach($affiliates as $affiliate)
                                        <option
                                            @if ($affiliate->id == old('affiliate_id', $linkedInfoFirstItem->affiliate_id ?? ''))
                                            selected="selected"
                                            @endif
                                            value="{{$affiliate->id}}">{{$affiliate->affiliate_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td><input type="text" name="link_affiliate[]" placeholder="Enter affiliate" class="form-control name_list" value="{{old('affiliate_link', $linkedInfoFirstItem->affiliate_link ?? '')}} "/></td>
                        <td></td>
                    </tr>
                    @foreach($linkedInfo as $linked)
                        <tr id="row{{$linked->record_id}}" class="dynamic-added"><td>
                                <select class="form-control name_list" name="affiliate[]">
                                    @foreach($affiliates as $affiliate)
                                        <option
                                            @if ($affiliate->id == old('affiliate_id', $linked->affiliate_id ?? ''))
                                            selected="selected"
                                            @endif
                                            value="{{$affiliate->id}}">{{$affiliate->affiliate_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" name="link_affiliate[]" placeholder="Enter your Name" class="form-control name_list" value="{{old('affiliate_link', $linked->affiliate_link ?? '')}} ">
                            </td><td><button type="button" name="remove" id="{{$linked->record_id}}" class="btn btn-danger btn_remove">X</button>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <button style="margin: 0 150px;" type="button" name="add" id="add" class="btn btn-success">Add Row</button>
                <input  type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var postURL = "<?php echo route('user.info.save.linked'); ?>";
        console.log(postURL);
        var i=1;
        let affiliateOption = document.getElementById("select-affiliate-dropdown");
        let affiliate = affiliateOption.innerHTML;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('' +
                '<tr id="row'+i+'" class="dynamic-added">' +
                '<td>' + affiliate +
                '</td>' +
                '<td><input type="text" name="link_affiliate[]" placeholder="Enter your Name" class="form-control name_list" />' +
                '</td>' +
                '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>' +
                '</tr>');
        });


        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#submit').click(function(){
            $.ajax({
                url:postURL,
                method:"POST",
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }
            });
        });


        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $(".print-success-msg").css('display','none');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });
</script>
</body>
</html>
