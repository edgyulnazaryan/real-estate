@extends('layouts.app')
@extends('header')


@section('content')
<div class="row">
    

<div class="container">
    <div class="row">
        <div class="col-2">
            <div class="card  mt-3">
                <label>
                    <input type="checkbox" name="gnel" class="gnel" value="Գնել">
                    Գնել
                    <input type="checkbox" name="vardz" class="vardz" value="Վարձակալել">
                    Վարձակալել
                </label>

            </div>

            <div class="card  mt-3">
                
            <h5>Գին</h5>

            <div class="form-group mt-3">
                <input type="number" name="min_price" class="form-control min" placeholder="Մին" min="1" value="1">
                <div class="mt-1"></div>
                <input type="number" name="max_price" class="form-control max" placeholder="Մաքս">
            </div>

            </div>
            <div class="card  mt-3">
                <h5>Արտաքին պատ</h5>
                <label>
                    <input type="checkbox" name="wall_type_monolit" class="monolit" value="Մոնոլիտ">
                    Մոնոլիտ
                </label>

                <label>
                    <input type="checkbox" name="wall_type_qar" class="qar" value="Քարե">
                    Քարե
                </label>

                <label>
                    <input type="checkbox" name="wall_type_panel" class="panel" value="Պանել">
                    Պանելային
                </label>
            </div>

            <div class="card  mt-3">
                
                <h5>Տեսակ</h5>
                <div class="form-group mt-3">
                    <label>
                    <input type="checkbox" name="type_bnakaran" class="bnakaran" value="Բնակարան">
                    Բնակարան
                </label>

                <label>
                    <input type="checkbox" name="type_arandznatun" class="arandznatun" value="Առանձնատուն">
                    Առանձնատուն
                </label>

                <label>
                    <input type="checkbox" name="type_komercion" class="komercion" value="Կոմերցիոն">
                    Կոմերցիոն
                </label>

                <label>
                    <input type="checkbox" name="type_hox" class="hox" value="Հողատարածք">
                    Հողատարածք
                </label>

                </div>

            </div> 
            <div class="card  mt-3">
                <input type="range" name="area" min="1" class="area slider" value="1" step="50" max="5000">
                Area: <p class="area_count"></p>
            </div>

            <div class="card  mt-3">
                <h5>Սենյակներ</h5>
                <input type="number" name="room" min="1" class="room form-control">
            </div>
            <button class="btn btn-success col-12 mt-3 search_btn">Search</button>

                
            
             
        </div>
        <div class="col-10" >
        <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Buy type</th>
                <th>Wall</th>
                <th>Status</th>
                <th>Price</th>
                <th>Address</th>
                <th>Area</th>
                <th>Rooms</th>
                
            </tr>
        </thead>
        <tbody id="result" >
        
                
            
        </tbody>
        </table>
        </div>
        
    </div>
</div>




<script type="text/javascript">
$(document).ready(function($)
{
    
    $(".area").change(function()
    {
        $(".area_count").html($('.area').val())
    })
    $(".search_btn").click(function()
    {   
        var wall = [];
        var buy_type = [];
        var type = [];
        if ($('.gnel').is(":checked")) 
        {
            buy_type.push($(".gnel").val())
        }
        if ($('.vardz').is(":checked")) 
        {
            buy_type.push($(".vardz").val())
        }
        if ($('.monolit').is(":checked")) 
        {
            wall.push($(".monolit").val())
        }
        if ($('.qar').is(":checked")) 
        {
            wall.push($(".qar").val())
        }
        if ($('.panel').is(":checked")) 
        {
            wall.push($(".panel").val())
        }
        if ($('.bnakaran').is(":checked")) 
        {
            type.push($(".bnakaran").val())
        }
        if ($('.arandznatun').is(":checked")) 
        {
            type.push($(".arandznatun").val())
        }
        if ($('.komercion').is(":checked")) 
        {
            type.push($(".komercion").val())
        }
        if ($('.hox').is(":checked")) 
        {
            type.push($(".hox").val())
        }
        
        var min = $(".min").val()
        var max = $(".max").val()
        var area = $('.area').val()
        var room = $('.room').val()
        console.log(type)
        $.ajax(
            {
                url:"{{route('search')}}",
                method:'get',
                data: {buy_type:buy_type, min:min, max:max, wall:wall, type:type, area:area, room:room},
                dataType: "text",
                success: function(data)
                {
                    $("#result").html('')
                    data = JSON.parse(data)

                    for(i=0; i<data.length; i++)
                    {
                        $("#result").append('<tr><td>'+data[i]['id']+'</td><td>'+data[i]['type']+'</td><td>'+data[i]['buy_type']+'</td><td>'+data[i]['wall']+'</td><td>'+data[i]['status']+'</td><td>'+data[i]['price']+'</td><td>'+data[i]['address']+'</td><td>'+data[i]['area']+'</td><td>'+data[i]['room']+'</td></tr>');
                    }
                    console.log(data)
                }
            })
        
    })
})
    

</script>

</div>

@endsection
        
