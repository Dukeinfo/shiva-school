
@php
$getRouteName =  Route::currentRouteName();

$widgets =  App\Models\Widget::where('status','Active')->where('pname',$getRouteName )->get(); 
@endphp

<ul class="list-style-02 alt-font font-weight-500 text-small text-uppercase text-extra-dark-gray my-4">

     @if(isset($widgets) && count($widgets) >0 )  
                        @foreach($widgets as $widget) 
                      
            @php
                $link = str_replace('home.', '', $widget->spname);
                $widgetlink=str_replace('_', '-', $link);
            @endphp 
           
        
                 <li class="padding-15px-bottom border-bottom border-color-medium-gray">
                 @if($widget->spname)        
                 <a href="javascript:void()" class="text-tussock-hover">
                 @if(session()->get('language') == 'gujrati') 
                    {{$widget->pagetitleguj}} 
                 @else 
                    {{$widget->pagetitle}}
                 @endif   
                 </a>
                 @else
                  <a href="javascript:void()" class="text-tussock-hover">
                 @if(session()->get('language') == 'gujrati') 
                    {{$widget->pagetitleguj}} 
                 @else 
                    {{$widget->pagetitle}}
                 @endif

                 @endif
                </li>




                       @endforeach 
      @endif                       
</ul>