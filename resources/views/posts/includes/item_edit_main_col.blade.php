@inject('categories','App\Services\CategoryService')
@php
    /** @var \App\Models\Category @item */
@endphp
<div class="row justify-content-center" style="margin-right: 10%; margin-bottom: 20%">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Base data</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" value="{{ old('name', $item->name) }}"
                                   id="name"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>


                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content"
                                      id="content"
                                      class="form-control"
                                      rows="3">{{ old('content', $item->content) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" class="form-control-file" id="file" name="file">
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category Post</label>
                            <select name="category_id"
                                    id="category_id"
                                    class="form-control"
                                    required>
                                <option value="" selected disabled>Select category</option>
                                @foreach($categories->getForPostEdit() as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                            @if($categoryOption->id == old('category_id',$item->category_id)) selected @endif>
                                        {{--{{ $categoryOption->id }} . {{ $categoryOption->title }}--}}
                                        {{ $categoryOption->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
