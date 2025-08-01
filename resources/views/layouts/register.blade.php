@extends('layouts.app')

@section('content')
    <section class="quest">
        <div class="quest__progress"><span style="width: @yield("prc","40%");"></span></div>
        <div class="quest__block" style="position: relative">
            <div style="position:absolute;right: 20px;top:10px;opacity: 0.7">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" width="10" height="10" viewBox="-13.39 0 122.88 122.88" version="1.1" id="Layer_1" enable-background="new 0 0 96.108 122.88" xml:space="preserve">

<g>

    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.892,56.036h8.959v-1.075V37.117c0-10.205,4.177-19.484,10.898-26.207v-0.009 C29.473,4.177,38.754,0,48.966,0C59.17,0,68.449,4.177,75.173,10.901l0.01,0.009c6.721,6.723,10.898,16.002,10.898,26.207v17.844 v1.075h7.136c1.59,0,2.892,1.302,2.892,2.891v61.062c0,1.589-1.302,2.891-2.892,2.891H2.892c-1.59,0-2.892-1.302-2.892-2.891 V58.927C0,57.338,1.302,56.036,2.892,56.036L2.892,56.036z M26.271,56.036h45.387v-1.075V36.911c0-6.24-2.554-11.917-6.662-16.03 l-0.005,0.004c-4.111-4.114-9.787-6.669-16.025-6.669c-6.241,0-11.917,2.554-16.033,6.665c-4.109,4.113-6.662,9.79-6.662,16.03 v18.051V56.036L26.271,56.036z M49.149,89.448l4.581,21.139l-12.557,0.053l3.685-21.423c-3.431-1.1-5.918-4.315-5.918-8.111 c0-4.701,3.81-8.511,8.513-8.511c4.698,0,8.511,3.81,8.511,8.511C55.964,85.226,53.036,88.663,49.149,89.448L49.149,89.448z"/>

</g>

</svg>
                Secure Application
            </div>
            @yield("step")
        </div>
@endsection
