@extends('admin.layouts.admin')
@section('section')

<div class="page-content">


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-xl-2">
                            <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#addnewproduct">
                            <i class='bx bxs-plus-square'></i>Nouveau Produit</button>
                        </div>
                        <div class="col-lg-9 col-xl-10">
                            <form class="float-lg-end">
                                <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                    <div class="col">
                                        <div class="position-relative">
                                            <input type="text" class="form-control ps-5" placeholder="Search Product..."> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                            <button type="button" class="btn btn-white">Sort By</button>
                                            <div class="btn-group" role="group">
                                              <button id="btnGroupDrop1" type="button" class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class='bx bx-chevron-down'></i>
                                              </button>
                                              <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                              </ul>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col">
                                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                            <button type="button" class="btn btn-white">Collection Type</button>
                                            <div class="btn-group" role="group">
                                              <button id="btnGroupDrop1" type="button" class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class='bx bxs-category'></i>
                                              </button>
                                              <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                              </ul>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-white">Price Range</button>
                                            <div class="btn-group" role="group">
                                              <button id="btnGroupDrop1" type="button" class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class='bx bx-slider'></i>
                                              </button>
                                              <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="btnGroupDrop1">
                                                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                              </ul>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- blog de  liste des produit --}}

    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
        @forelse ($articles as $article)
        <div class="col">
            <a href="{{ route('admin.article.show', $article->uuid) }}">
                <div class="card">
                    <img src="{{ asset('files/' . $article->image) }}" class="card-img-top" alt="article image" style="max-height: 200px; min-height: 200px">

                    <div class="position-absolute bg-info badge p-2 d-flex mt-1 end-0">{{ $article->code }}</div>

                    <div class="card-body mt-2">
                        <h6 class="card-title cursor-pointer text-uppercase" style="min-height: 40px !important">{{ $article->libelle }}</h6>
                        <div class="clearfi row pb-0 mb-0">
                            <p class="text-muted col-6 mb-0" style="font-size: 11px">Sale Model</p>
                            <p class="text-muted col-6 mb-0" style="font-size: 11px">Marque</p>
                        </div>
                        <div class="clearfix row py-0">
                            <p class="mb-0 col-6 text-uppercase fw-bold" style="font-size: 12px">{{ $article->sale_model }}</p>
                            <p class="mb-0 fw-bold col-6 text-uppercase" style="font-size: 12px">{{ $article->marque->libelle }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @empty
            <div class="content aucun_product w-100 row">
                <div class="col"></div>
                <div class="col aucun_product text-center fs-5">Aucun produit</div>
                <div class="col"></div>

            </div>
        @endforelse
    </div><!--end row-->

    {{-- modal ajout de produit --}}

    <div class="col">
        <!-- Modal -->
        <div class="modal fade " id="addnewproduct" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl" style="margin-top:0; margin-right: 0">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter nouveaux produits</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body p-4">

                                <div class="form-body mt-4">
                                    <form method="post" action="{{ route('admin.article.store') }}" class="submitForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="border border-3 p-4 rounded">

                                                    {{-- <div class="mb-3">
                                                        <label for="inputProductid" class="form-label">Sale Model</label>
                                                        <input type="text" class="form-control" id="inputProductid"
                                                            placeholder="Enter identifiant du produit" name="sale_model" autocomplete="off">
                                                    </div> --}}

                                                    <div class="mb-3">
                                                        <label for="inputProductTitle" class="form-label">Libelle du produit</label>
                                                        <input type="text" class="form-control" id="inputProductTitle"
                                                            placeholder="Enter libelle du produit" name="libelle" autocomplete="off">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputDescription" class="form-label">Description</label>
                                                        <textarea class="form-control" id="inputDescription"
                                                            rows="3" name="description" autocomplete="off"></textarea>
                                                    </div>
                                                    {{-- <div class="mb-3">
                                                        <label for="inputNavire" class="form-label">Navire Impact</label>
                                                        <textarea class="form-control" id="inputNavire"
                                                            rows="3" name="navire_impact" autocomplete="off"></textarea>
                                                    </div> --}}
                                                    <div class="image-upload-container">
                                                        <label for="inputProductimg" class="form-label">Télécharger images</label>
                                                        <input type="file" id="inputProductimg" name="image" accept="image/*" multiple autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="border border-3 p-4 rounded">
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label id="hauteur" class="form-label">Hauteur(m)</label>
                                                            <input class="form-control" type="number" name="hauteur" id="hauteur" placeholder="00.00" autocomplete="off"/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label id="poid_tonne" class="form-label">Poids/Tonnes</label>
                                                            <input class="form-control" type="number" name="poid_tonne" id="poid_tonne" placeholder="00.00" autocomplete="off"/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label id="volume" class="form-label">Volume(en m²)</label>
                                                            <input class="form-control" type="number" name="volume" id="volume" placeholder="00.00" autocomplete="off"/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="longueur" class="form-label">Longueur(m)</label>
                                                            <input type="number" class="form-control" id="longueur"
                                                                placeholder="00.00" name="longueur" autocomplete="off">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="source_uuid" class="form-label">Ship Source</label>
                                                            <select name="source_uuid" class="form-select" id="source_uuid" autocomplete="off">
                                                                @foreach ($sources as $source)
                                                                    <option value="{{ $source->uuid }}">{{ $source->libelle }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="inputProductMarque" class="form-label">Marque</label>
                                                            <select class="form-select" id="inputProductMarque" name="marque_uuid" autocomplete="off">
                                                                @foreach ($marques as $marque)
                                                                <option value="{{ $marque->uuid }}">{{ $marque->libelle }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="inputCategory" class="form-label">Categorie</label>
                                                            <select class="form-select" id="inputCategory" name="categorie_uuid" autocomplete="off">
                                                                @foreach ($categories as $categorie)
                                                                <option value="{{ $categorie->uuid }}">{{ $categorie->libelle }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="inputCollection" class="form-label">Packaging</label>
                                                            <select class="form-select" id="inputCollection" name="packaging" autocomplete="off">
                                                                <option></option>
                                                                <option value="roro">Roro</option>
                                                                <option value="container">Container</option>
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


</div>


@endsection
