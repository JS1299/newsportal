@extends('layouts.mainview')
@section('content')
    <div class="container" id="userspanel">
        <div id="notifDiv"
             style="z-index:10000; display: none; background: green; font-weight: 450; width: 350px; position: fixed; top: 80%; left: 5%; color: white; padding: 5px 20px">
        </div>
        <h2 class="bg-dark text-white text-center p-4">Users Listing</h2>

        <div id="get_data">

        </div>
    </div>

    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="/js/custom.js"></script>
@endsection
