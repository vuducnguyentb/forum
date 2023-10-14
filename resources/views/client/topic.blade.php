@extends('layouts.app')

@section('content')
    <div class="container">
        <nav class="breadcrumb">
            <a href="#" class="breadcrumb-item"> Forum Name</a>
            <a href="#" class="breadcrumb-item">Forum Category</a>
            <a href="#" class="breadcrumb-item">Forum Name</a>
            <span class="breadcrumb-item active"
            >{{$topic->title}}</span
            >
        </nav>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Category one -->
                    <div class="col-lg-12">
                        <!-- second section  -->
                        <h4 class="text-white bg-info mb-0 p-4 rounded-top">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        </h4>
                        <table
                            class="table table-striped table-responsivelg table-bordered"
                        >
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Author</th>
                                <th scope="col">Message</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="author-col">
                                    <div>by<a href="#"> author name</a></div>
                                </td>
                                <td class="post-col d-lg-flex justify-content-lg-between">
                                    <div>
                                        <span class="font-weight-bold">Discussion subject:</span>
                                        {{$topic->title}}
                                    </div>
                                    <div>
                                        <span class="font-weight-bold">Posted:</span> {{$topic->created_at->diffForHumans()}}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <span class="font-weight-bold">Joined:</span>{{$topic->user->created_at}}
                                    </div>
                                    <div>
                                        <span class="font-weight-bold">Discussions:</span> {{$topic->user->topics->count()}}
                                    </div>
                                </td>
                                <td>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Soluta possimus, iusto, dolorem quo commodi, quisquam
                                        porro id est fugiat culpa voluptas saepe libero!
                                        Veritatis, laudantium. Ut distinctio error maxime
                                        cupiditate?
                                    </p>
                                    <img
                                        src="https://placehold.it/600x400"
                                        alt=""
                                        class="img-fluid"
                                    />
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Nisi illum laborum est nemo, deserunt quasi esse debitis
                                        porro unde natus, magnam ducimus vel enim quia nam? Odio
                                        corrupti ratione accusamus molestias iusto quae, alias
                                        reiciendis dignissimos, voluptatum magnam perferendis
                                        aperiam.
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <table
                            class="table table-striped table-responsivelg table-bordered"
                        >
                            <tbody>
                            <tr>
                                <td class="author-col">
                                    <div>by<a href="#"> author name</a></div>
                                </td>
                                <td class="post-col d-lg-flex justify-content-lg-between">
                                    <div>
                                        <span class="font-weight-bold">Post subject:</span>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing
                                    </div>
                                    <div>
                                        <span class="font-weight-bold">Posted:</span> 08.10.2021
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <span class="font-weight-bold">Joined:</span>08.10.2021
                                    </div>
                                    <div>
                                        <span class="font-weight-bold">Posts:</span> 200
                                    </div>
                                </td>
                                <td>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Soluta possimus, iusto, dolorem quo commodi, quisquam
                                        porro id est fugiat culpa voluptas saepe libero!
                                        Veritatis, laudantium. Ut distinctio error maxime
                                        cupiditate?
                                    </p>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Nisi illum laborum est nemo, deserunt quasi esse debitis
                                        porro unde natus, magnam ducimus vel enim quia nam? Odio
                                        corrupti ratione accusamus molestias iusto quae, alias
                                        reiciendis dignissimos, voluptatum magnam perferendis
                                        aperiam.
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3 clearfix">
            <nav aria-label="Navigate post pages" class="float-lg-right">
                <ul class="pagination pagination-sm mb-lg-0">
                    <li class="page-item active">
                        <a href="#" class="page-link">1</a>
                    </li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item">
                        <a href="#" class="page-link">&hellip;</a>
                    </li>
                    <li class="page-item"><a href="#" class="page-link">9</a></li>
                    <li class="page-item"><a href="#" class="page-link">10</a></li>
                </ul>
            </nav>
        </div>

        @if(auth()->user())
            <form action="" class="mb-3">
                <div class="form-group">
                    <label for="comment">Reply to this post</label>
                    <textarea
                        class="form-control"
                        name="comment"
                        id=""
                        rows="10"
                        required
                    ></textarea>
                    <button type="submit" class="btn btn-primary mt-2 mb-lg-5">
                        Submit reply
                    </button>
                    <button type="reset" class="btn btn-danger mt-2 mb-lg-5">
                        Reset
                    </button>
                </div>
            </form>

        @endif
    </div>

@endsection

