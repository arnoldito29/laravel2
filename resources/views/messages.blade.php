@if($messages->count() > 0)
    <div class="row">
        <div class="col-sm-3">Date</div>
        <div class="col-sm-3">Sender</div>
        <div class="col-sm-3">Receiver</div>
        <div class="col-sm-3">Message</div>
    </div>
    @foreach ($messages as $message)
        <div class="row">
            <div class="col-sm-3">{{$message->created_at}}</div>
            <div class="col-sm-3">{{$message->sender->name}}({{$message->sender->email}})</div>
            <div class="col-sm-3">{{$message->receiver->name}}({{$message->receiver->email}})</div>
            <div class="col-sm-3">{{$message->message}}</div>
        </div>
    @endforeach
@endif
<div class="row">
    @if ($messages->lastPage() > 1)
        <ul class="pagination">
            <li class="{{ ($messages->currentPage() == 1) ? ' disabled' : '' }}">
                <a href="{{ $messages->url(1) }}">Previous</a>
            </li>
            @for ($i = 1; $i <= $messages->lastPage(); $i++)
                <li class="{{ ($messages->currentPage() == $i) ? ' active' : '' }}">
                    <a href="{{ $messages->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="{{ ($messages->currentPage() == $messages->lastPage()) ? ' disabled' : '' }}">
                <a href="{{ $messages->url($messages->currentPage()+1) }}" >Next</a>
            </li>
        </ul>
    @endif
</div>