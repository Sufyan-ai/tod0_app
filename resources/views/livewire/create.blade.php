<div>
<form>
            <div>
                <label for="title">Thumbnail:</label>
                <input type="text" id="thumbnail" placeholder="Enter Title" wire:model="thumbnail">
                @error('title')
                    <span >{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="title">Description:</label>
                <input type="text" id="thumbnail" placeholder="Enter Title" wire:model="description">
                @error('title')
                    <span >{{ $message }}</span>
                @enderror
            </div>
            <div>
            <label for="title">Category:</label>
            <select wire:model.="category_id" id="category_id" class="tf-input">
                <option value="null" disabled>{{ __('Please select') }}</option>
                @foreach ($this->category as $category)
                    <option value="{{ $category->id }}" wire:key="category-{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            </div>
            <div class="d-grid gap-2">
                <button wire:click.prevent="storeTask()" >Save</button>
            </div>
        </form>
        @livewireScripts
</div>