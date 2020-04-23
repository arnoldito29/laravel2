<form id="newMessage">
    <div class="form-group">
        <label for="sender">Email address</label>
        <input type="email" class="form-control" id="sender" value="{{Auth::user()->email}}" @if (!Auth::user()->isAdmin()) readonly @endif>
    </div>

    <div class="form-group">
        <label for="receiver">Receiver</label>
        <input type="email" class="form-control" id="receiver">
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control" id="message" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>