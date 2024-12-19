<div class="w-100">
    <div>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="container my-5">
        <div class="row w-100">
            <div class="col-12">
                <div class="center">
                    <h2>{{__('ui.titleViewCreate')}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 ">
        <div>
            <form wire:submit='store' method="POST" class="shadow p-5 w-100" enctype="multipart/form-data">
                @csrf
                <div>
                    <div class="mb-3">
                        <div class="p-2 d-flex flex-column">
                            <h5>{{__('ui.categoryCard')}}</h5>
                            <select wire:model='category_id'>
                                <Option>--Seleziona Categoria--</Option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>
                </div>
                <!-- title -->
                <div class="mb-3">
                    <h5>{{__('ui.titleCreate')}}</h5>
                    <input type="text" wire:model.live='title' class="form-control" id="title" value="{{old('title')}}">
                    <div class="error">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <!-- upload file -->
                <div class="mb-3">
                    @error('images')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <h5>{{__('ui.insertFile')}}</h5>
                    <input type="file" wire:model.live='temporary_images' multiple class="form-control shadow @error ('temporary_images.*') is-invalid @enderror" placeholder="Img/" name="Images">
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
                            <div class="col-12 col-md-3 d-flex flex-column align-items-center my-3 ">
                                <img src="{{$image->temporaryUrl()}}" alt="" class="img-preview mx-auto shadow rounded " id="styleImagePreview">
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
                    <textarea wire:model='description' placeholder="Leave a comment here" id="floatingTextarea" cols="50">{{old('description')}}</textarea><br>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- price -->
                <div class="mb-3">
                    <h5>{{__('ui.priceCard')}}</h5>
                    <div class="d-flex">
                        <input type="number" step="0.01" wire:model='price' style="direction: rtl; text-align: right;" class="form-control" id="price" value="{{old('price')}}"><span class="fs-3">€</span>
                    </div>
                    @error('price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="center">
                    <button type="submit" class="btn">{{__('ui.buttonCreate')}}</button>
                </div>
            </form>
        </div>
    </div>

</div>