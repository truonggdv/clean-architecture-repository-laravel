@foreach ($users as $user)
    <p>{{ $user['name'] }} - <a href="{{ route('users.edit', $user['id']) }}">Edit</a> | 
       <form action="{{ route('users.destroy', $user['id']) }}" method="POST">
           @csrf @method('DELETE')
           <button type="submit">Delete</button>
       </form>
    </p>
@endforeach
