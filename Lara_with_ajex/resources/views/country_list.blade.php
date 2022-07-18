<select name="" id="country">
    <option value="">select the country</option>
    @foreach($country as $data)
    <option value="{{$data->conuntry_id}}">{{$data->contry_name}}</option>
    @endforeach
</select>

<select name="" id="state">
    <option value="">select the state</option>
</select>

<select name="" id="city">
    <option value="">select the city</option>
</select>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    //select the state belongs to country from ajex
    $(document).ready(function() {
        $("#country").change(function() {
            let cid = $(this).val();
            //alert(cid);
            $.ajax({
                url: '/getState',
                type: 'post',
                data: 'cid=' + cid + '&_token={{csrf_token()}}',
                success: function(result) {
                    $("#state").html(result);
                }
            });
        });
        //select citry belogns to state ...

        $("#state").change(function() {
            let sid = $(this).val();
            $.ajax({
                url: '/getCity',
                type: 'post',
                data: 'sid=' + sid + '&_token={{csrf_token()}}',
                success: function(result) {
                    $("#city").html(result);
                }
            });
        });
    });
</script>