 <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a hef="#"></a>
                </div>
                <div class="navi">
                    <ul>
                        <li class="active"><a href="/galeria"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Galeria</span></a></li>
                        <li class="row toggle" id="dropdown-detail-1" data-toggle="detail-1"><a href="javascript:void(0)"><i class="glyphicon glyphicon-filter" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Filtros</span></a></li>
                            
                            <div id="detail-1">
                                <hr>
                                      <li><a href="{{ route('Imagem.filtrarImagem', ['Novos']) }}"><span class="hidden-xs hidden-sm">Novos</span></a></li> 
                                     
                                </div>
                    </ul>
                </div>
            </div>



<script>
$(document).ready(function() {
    $('[id^=detail-]').hide();
    $('.toggle').click(function() {
        $input = $( this );
        $target = $('#'+$input.attr('data-toggle'));
        $target.slideToggle();
    });
});


</script>

<style>
#detail-1 > li > a{
padding-top:0px;
padding-bottom: 0px;
}
#navigation{
    width: 205px;
}

</style>