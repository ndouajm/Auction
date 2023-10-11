@extends('admin.layouts.admin')
@section('section')


<div class="card">
    <div class="row g-0">
        <div class="col-md-4 border-end">
            <img src="{{ asset('files/' . $article->image) }}" class="img-fluid" alt="..." style="max-height: 460px; min-height: 460px">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h4 class="card-title text-uppercase">{{ $article->libelle }}</h4>
                <div class="d-flex gap-2 py-3">
                    <span>Code :</span><div class="ms-3">#{{ $article->code }}</div>
                </div>
                <hr>
                <dl class="row">
                    <dt class="col-sm-3">Sale Model#</dt>
                    <dd class="col-sm-9">{{ $article->sale_model }}</dd>

                    <dt class="col-sm-3">Marque</dt>
                    <dd class="col-sm-9 text-uppercase">{{ $article->marque->libelle }}</dd>

                    <dt class="col-sm-3">Categorie</dt>
                    <dd class="col-sm-9 text-uppercase">{{ $article->category->libelle }} </dd>
                </dl>
                <hr>
                <div class="row gap-2 d-flex">
                    <div class="col">
                        <dl class="row col-12">
                            <dt class="col-sm-6">Hauteur</dt>
                            <dd class="col-sm-6">{{ $article->hauteur }} Mètre</dd>
                        </dl>
                        <dl class="row col-12">
                            <dt class="col-sm-6">Packaging</dt>
                            <dd class="col-sm-6">{{ $article->packaging }}</dd>
                        </dl>

                        <dl class="row col-12">
                            <dt class="col-sm-6">Ship Source</dt>
                            <dd class="col-sm-6">{{ $article->ship_source->libelle }}</dd>
                        </dl>
                    </div>
                    <div class="col">
                        <dl class="row col-12">
                            <dt class="col-sm-6">Volume</dt>
                            <dd class="col-sm-6">{{ $article->volume }} Mètre<sup>2</sup></dd>
                        </dl>
                        <dl class="row col-12">
                            <dt class="col-sm-6">Longueur</dt>
                            <dd class="col-sm-6">{{ $article->longueur }} Mètre</dd>
                        </dl>
                        <dl class="row col-12">
                            <dt class="col-sm-6">Poids</dt>
                            <dd class="col-sm-6">{{ $article->poid_tonne }} Tonne</dd>
                        </dl>
                    </div>
                </div>
                <div class="d-flex gap-3 mt-3">
                    <a class="ms-3 deleteConfirmation btn btn-outline-danger" data-uuid="{{$article->uuid}}"
                        data-type="confirmation_redirect" data-placement="top"
                        data-token="{{ csrf_token() }}"
                        data-url="{{route('admin.article.destroy',$article->uuid)}}"
                        data-title="Vous êtes sur le point de supprimer {{$article->libelle}} "
                        data-id="{{$article->uuid}}" data-param="0"
                        data-route="{{route('admin.article.destroy',$article->uuid)}}"><i
                            class='bx bxs-trash' style="cursor: pointer"></i>Supprimer</a>

                    <button type="button" class="btn btn-outline-info mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#editProduct">
                        <i class='bx bxs-plus-square'></i>Modifier</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="card-body mb-4">
        <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                    aria-selected="true">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class='bx bx-comment-detail font-18 me-1'></i>
                        </div>
                        <div class="tab-title"> Product Description </div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                    aria-selected="false">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class='bx bx-bookmark-alt font-18 me-1'></i>
                        </div>
                        <div class="tab-title">Tags</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab"
                    aria-selected="false">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class='bx bx-star font-18 me-1'></i>
                        </div>
                        <div class="tab-title">Reviews</div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="tab-content pt-3">
            <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                <div class="content px-3">{{ $article->description }}</div>
            </div>
            <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee
                    squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes
                    anderson artisan four loko farm-to-table craft beer twee. Qui photo booth
                    letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl
                    cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.
                    Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan
                    fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY
                    ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr
                    butcher vero sint qui sapiente accusamus tattooed echo park.</p>
            </div>
            <div class="tab-pane fade" id="primarycontact" role="tabpanel">
                <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's
                    organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify
                    pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy
                    hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred
                    pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel
                    fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of
                    them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.
                </p>
            </div>
        </div>
    </div>



     <!-- Modal Edit product-->
     <div class="modal fade " id="editProduct" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="margin-top:0; margin-right: 0">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier Produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="form-body mt-4">
                                <form method="post" action="{{ route('admin.article.update', $article->uuid) }}" class="submitForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="border border-3 p-4 rounded">

                                                {{-- <div class="mb-3">
                                                    <label for="inputProductid" class="form-label">Sale Model</label>
                                                    <input type="text" class="form-control" id="inputProductid"
                                                        placeholder="Enter identifiant du produit" name="sale_model" value="{{ $article->sale_model }}">
                                                </div> --}}

                                                <div class="mb-3">
                                                    <label for="inputProductTitle" class="form-label">Libelle du produit</label>
                                                    <input type="text" class="form-control" id="inputProductTitle"
                                                        placeholder="Enter libelle du produit" name="libelle" value="{{ $article->libelle }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputDescription" class="form-label">Description</label>
                                                    <textarea class="form-control" id="inputDescription"
                                                        rows="3" name="description" value="{{ $article->description }}"> {{ $article->description }}</textarea>
                                                </div>
                                                {{-- <div class="mb-3">
                                                    <label for="inputNavire" class="form-label">Navire Impact</label>
                                                    <textarea class="form-control" id="inputNavire"
                                                        rows="3" name="navire_impact" value="{{ $article->navire_impact }}">{{ $article->navire_impact }}</textarea>
                                                </div> --}}
                                                <div class="image-upload-container">
                                                    <label for="inputProductimg" class="form-label">Télécharger images</label>
                                                    <input type="file" id="inputProductimg" name="image" accept="image/*" multiple>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="border border-3 p-4 rounded">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label id="hauteur" class="form-label">Hauteur(m)</label>
                                                        <input class="form-control" type="number" name="hauteur" id="hauteur" placeholder="00.00" value="{{ $article->hauteur }}"/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label id="poid_tonne" class="form-label">Poids/Tonnes</label>
                                                        <input class="form-control" type="number" name="poid_tonne" id="poid_tonne" placeholder="00.00" value="{{ $article->poid_tonne }}"/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label id="volume" class="form-label">Volume(en m²)</label>
                                                        <input class="form-control" type="number" name="volume" id="volume" placeholder="00.00" value="{{ $article->volume }}"/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="longueur" class="form-label">Longueur(m)</label>
                                                        <input type="number" class="form-control" id="longueur"
                                                            placeholder="00.00" name="longueur" value="{{ $article->longueur }}">
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="source_uuid" class="form-label">Ship Source</label>
                                                        <select name="source_uuid" class="form-select" id="source_uuid" autocomplete="off">
                                                            <option value="{{ $article->source_uuid }}">{{ $article->ship_source->libelle }}</option>
                                                            @foreach ($sources as $source)
                                                                @if ($source->uuid != $article->source_uuid)
                                                                <option value="{{ $source->uuid }}">{{ $source->libelle }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="inputProductMarque" class="form-label">Marque</label>
                                                        <select class="form-select" id="inputProductMarque" name="marque_uuid" >
                                                            <option value="{{ $article->marque->uuid }}">{{ $article->marque->libelle }}</option>
                                                            @foreach ($marques as $marque)
                                                                @if ($marque->uuid != $article->marque->uuid)
                                                                <option value="{{ $marque->uuid }}">{{ $marque->libelle }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="inputCategory" class="form-label">Categorie</label>
                                                        <select class="form-select" id="inputCategory" name="categorie_uuid" autocomplete="off">
                                                            <option value="{{ $article->category->uuid }}">{{ $article->category->libelle }}</option>
                                                            @foreach ($categories as $categorie)
                                                                @if ($categorie->uuid != $article->category->uuid)
                                                                <option value="{{ $categorie->uuid }}">{{ $categorie->libelle }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="inputCollection" class="form-label">Packaging</label>
                                                        <select class="form-select" id="inputCollection" name="packaging" value="{{ $article->packaging }}">
                                                            <option>{{ $article->packaging }}</option>
                                                            @if ($article->packaging == 'container')
                                                                <option value="roro">Roro</option>
                                                            @elseif ($article->packaging == 'roro')
                                                                <option value="container">Container</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="d-grid">
                                                            <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>



@endsection
