<div class="outside  show">
    <div class="inside  show-top">
        <div class="custom-modal border rounded">
            <button class="btn border-0 exit rounded-circle bg-dark text-white">
               <span> &#x2715</span>
            </button>
            <div class="row">
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
                                    <input type="text" class="form-control word_orig-input" placeholder="Original" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="word_orig-error"></div>
                            </td>
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control word_trans-input" placeholder="Translate" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </td>
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
                                <th scope="col">Original word</th>
                                <th scope="col">Translate word</th>
                                <th scope="col">Update word</th>
                                <th scope="col">Remove word</th>
                            </tr>
                        </thead>
                        <tbody class="request-output-words"></tbody>
                    </table>
                </form>
                <div class="col-12" >
                    <nav  class="d-flex">
                        <ul class="pagination m-auto"><h1>Loading...</h1></ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>