<div class="w-100">
    <div class="container my-5">
        <div class="row w-100">
            <div class="col-12">
                <div>
                    <h2>{{__('ui.titleViewEdit')}}</h2>
                </div>
            </div>
            <div class="col-12 col-md-10">
                <div>
                    <form wire:submit='update' method="POST" class="shadow p-5" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="mb-3">
                                <label for="title" class="form-label">{{__('ui.categoryCard')}}</label>
                                <select wire:model='category_id'>

                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">{{__('ui.titleCreate')}}</label>
                            <input type="text" wire:model='title' class="form-control" id="title" value="{{$article->title}}">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <!-- upload file -->
                        <div class="mb-3">
                            <label for="Images">{{__('ui.insertFile')}}</label>
                            <input type="file" wire:model.live='temporary_images' multiple class="form-control shadow @error ('temporary_images.*') is-invalid @enderror" placeholder="Img/" name="images">
                            @error('temporary_images.*')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            @error ('temporary_images')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        @if (!empty($images))
                        <div class="row">
                            <div class="col-12">
                                <p>{{__('ui.anteprimaImage')}}</p>
                                <div class="row border border-4 border-success rounded shadow py-4">
                                    @foreach ($images as $key => $image)
                                    <div class="col d-flex flex-column align-items-center my-3">
                                        <div class="img-preview mx-auto shadow rounded">
                                            <img src="{{ $image->getUrl(300,300)}}" alt="" class="img-preview">
                                        </div>
                                        <button type="button" wire:click="removeImage({{$key}})" class="btnDeleteImagePreview">X</button>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- Description -->
                        <div class="form-floating p-3">
                            <h5>{{__('ui.descriptionCard')}}</h5>
                            <textarea wire:model='description' placeholder="Scrivi qui la descrizione" id="floatingTextarea" cols="50">{{$article->description}}</textarea>
                            @error('author')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <!-- price -->
                        <div class="mb-3">
                            <label for="price" class="form-label">{{__('ui.priceCard')}}</label>
                            <div class="d-flex flex-row center">
                                <input type="number" step="0.01" wire:model='price' class="form-control" style="direction: rtl; text-align: right;" id="price" value="{{$article->price}}"><span><i class="bi bi-currency-euro"></i></span>
                            </div>
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btnEdit" id="btnEditFormArticle">{{__('ui.editButton')}}</button>
                    </form>
                    <div class="center w-100">
                        <button wire:click='delete' class="btnDenied mx-4 my-4">{{__('ui.deleteButton')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>