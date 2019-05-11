<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/clients/codes/codemirror.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/clients/codes/ambiance.css')}}">
    <script src="{{ asset('js/clients/jquery-3.2.1.min.js') }}"></script>
    <script src="{{asset('js/clients/codes/codemirror.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/clients/codes/style.css')}}">
    <script src="{{ asset('js/clients/codes/editor-action.js') }}"></script>
    <script src="{{asset('js/clients/codes/htmlmixed.js')}}"></script>
    <script src="{{asset('js/clients/codes/xml.js')}}"></script>
    <script src="{{asset('js/clients/codes/javascript.js')}}"></script>
    <script src="{{asset('js/clients/codes/css.js')}}"></script>
    <script src="{{asset('js/clients/codes/clike.js')}}"></script>
    <script src="{{asset('js/clients/codes/php.js')}}"></script>
    <script src="{{asset('js/clients/codes/active-line.js')}}"></script>
    <script src="{{asset('js/clients/codes/matchbrackets.js')}}"></script>
</head>
    <div>
        <span><a href="javascript:void(0)" class="code-app code-active">php</a></span>
        <span><a href="javascript:void(0)" class="code-app">java</a></span>
        <span><a href="javascript:void(0)" class="code-app">c#</a></span>
        <span><a href="javascript:void(0)" class="code-app">ruby</a></span>
    </div>
    <textarea class="codemirror-textarea" id="code-editor" rows="2"></textarea>
    <div class="app-row">
        <button class="btn-action" id="run">Run</button>
        <button class="btn-action" id="refresh">Refresh</button><span id="error"></span>
    </div>
    <div class="app-row">
      <div id="result"></div>
    </div>
