<div class="outside">
    <div class="inside">
        <div class="custom-modal border rounded">
            <button class="btn border-0 exit rounded-circle bg-dark text-white">
               <span> &#x2715</span>
            </button>
            <table class="row">
                <form class="col-12">
                    <div class="d-flex">
                        <div class="pc-0-5 w-100">
                            <input type="text" class="form-control mr-1 pc-0-5" placeholder="Search word..." aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="pc-0-5">
                            <button type="button" class="btn btn-primary h-100 text-nowrap">Search similar</button>
                        </div>
                    </div>
                </form>
                <form class="col-12">
                    <table class="table table-borderless table-hover">
                        <tbody>
                        <tr>
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Original" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </td>
                            <td><div class="input-group">
                                    <input type="text" class="form-control" placeholder="Translate" aria-label="Username" aria-describedby="basic-addon1">
                                </div></td>
                            <td>
                                <button type="button" class="btn btn-success w-100 submit-add-word">Add word</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
                <form class="col-12">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Original</th>
                                <th scope="col">Translate</th>
                                <th scope="col">Update</th>
                                <th scope="col">Remove</th>
                            </tr>
                        </thead>
                        <tbody class="request-output-words">

                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>