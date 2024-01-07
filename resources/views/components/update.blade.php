<div class="update">
    <h4>UPDATE</h4>
    <form method="POST" action="{{ route('submitupdate',  $todo->id) }}"> 
        @csrf
        @method('PUT')
        <div class="">
            <label for="">todoName :</label>
            <input type="text" name="todoName" value="{{ $todo->todoName }}" required>
        </div>
        
        <div class="status">
            @if ($todo->status == 1)
            <label for="">done</label>
            <input type="checkbox" name="status" value="1" checked>

            <label for="">Not done yet</label>
            <input type="checkbox" name="status" value="0" >
            @else
            <label for="">done</label>
            <input type="checkbox" name="status" value="1" >

            <label for="">Not done yet</label>
            <input type="checkbox" name="status" value="0" checked>
            @endif

          
        <button class="submit">submit</button>
        


    </form>
    
</div>