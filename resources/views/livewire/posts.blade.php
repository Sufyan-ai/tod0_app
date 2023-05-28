<div>
    <div >
        <div class="card">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        @include('livewire.create')
            <div class="card-body">
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#Id</th>
                                <th>Thumbnail</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($tasks) > 0)
                                @foreach ($tasks as $post)
                                    <tr>
                                        <td>
                                            {{$post->id}}
                                        </td>
                                        <td>
                                            {{$post->thumbnail}}
                                        </td>
                                        <td>
                                            {{$post->description}}
                                        </td>
                                        <td>
                                        <input wire:click="editTask({{$post}})" type="checkbox" value="{{ $post}}" id="{{$post->id }}"
                                            @if( $post->status == '1')
                                                checked="checked"
                                            @endif
                                        >
                                        </td>
                                        <td>
                                        
                                        </td>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" align="center">
                                        No Posts Found.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 
</div>

