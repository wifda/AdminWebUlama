@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'daftar_ulama'
])
<style type="text/css">
	.pagination li{
		float: left;
		list-style-type: none;
		margin:5px;
	}
</style>
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url()->current() }}">
                <input type="text" name="keyword" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-primary"><i class="nc-icon nc-zoom-split"></i></button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Daftar Ulama Syafi'i</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table  class="table">
                            <thead class=" text-primary">
                                <th>No</th>
                                <th>Nama Ulama</th>
                                <th>Tahun Kelahiran (Masehi)</th>
                                <th>Tempat Kelahiran</th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                            <tr>
                            @php $i=1 @endphp
                            @foreach($ulama as $u)
                            <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $u->nama_ulama }}</td>
                            <td>{{ $u->tahun_lahir }}</td>
                            <td>{{ $u->tempat_lahir }}</td>
                            <td><button class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></button></td>
                            <td><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
                            </tr>
                            @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                    {{ $ulama->links() }}
                </div>
               
            </div>
        </div>
    </div>
</div>            
                
@endsection

@push('scripts')
    <script>
        function SelectText(element) {
            var doc = document,
                text = element,
                range, selection;
            if (doc.body.createTextRange) {
                range = document.body.createTextRange();
                range.moveToElementText(text);
                range.select();
            } else if (window.getSelection) {
                selection = window.getSelection();
                range = document.createRange();
                range.selectNodeContents(text);
                selection.removeAllRanges();
                selection.addRange(range);
            }
        }
        window.onload = function () {
            var iconsWrapper = document.getElementById('icons-wrapper'),
                listItems = iconsWrapper.getElementsByTagName('li');
            for (var i = 0; i < listItems.length; i++) {
                listItems[i].onclick = function fun(event) {
                    var selectedTagName = event.target.tagName.toLowerCase();
                    if (selectedTagName == 'p' || selectedTagName == 'em') {
                        SelectText(event.target);
                    } else if (selectedTagName == 'input') {
                        event.target.setSelectionRange(0, event.target.value.length);
                    }
                }

                var beforeContentChar = window.getComputedStyle(listItems[i].getElementsByTagName('i')[0], '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, ""),
                    beforeContent = beforeContentChar.charCodeAt(0).toString(16);
                var beforeContentElement = document.createElement("em");
                beforeContentElement.textContent = "\\" + beforeContent;
                listItems[i].appendChild(beforeContentElement);

                //create input element to copy/paste chart
                var charCharac = document.createElement('input');
                charCharac.setAttribute('type', 'text');
                charCharac.setAttribute('maxlength', '1');
                charCharac.setAttribute('readonly', 'true');
                charCharac.setAttribute('value', beforeContentChar);
                listItems[i].appendChild(charCharac);
            }
        }
    </script>
@endpush
