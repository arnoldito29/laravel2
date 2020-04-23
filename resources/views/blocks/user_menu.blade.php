<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="index-tab" data-toggle="tab" href="{{route('messages.index')}}" data-load="ajax" data-target="index" role="tab" aria-controls="index" aria-selected="true">index</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="new-tab" data-toggle="tab" href="#new" role="tab" aria-controls="new" data-target="new" aria-selected="false">New</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="sent-tab" data-toggle="tab" href="{{route('messages.sent')}}" role="tab" data-load="ajax" data-target="sent" aria-controls="sent" aria-selected="false">Sent</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="index" role="tabpanel" aria-labelledby="index-tab"></div>
    <div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="new-tab">@include('blocks.new_message')</div>
    <div class="tab-pane fade" id="sent" role="tabpanel" aria-labelledby="sent-tab"></div>
</div>