<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>parent_id</th>
            <th>image</th>
            <th>is_main</th>
            <th>actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $start = 0; ?>
        @foreach($galleries as $key => $gallery)

            @if(!$start)
                @include('admin.gallery.parts.tr_with_id_and_title')
                @include('admin.gallery.parts.tr_without_id_and_title')

            @else
                @include('admin.gallery.parts.tr_without_id_and_title')
            @endif

            <?php
            isset($galleries[$key+1]) && $galleries[$key+1]->parent_id != $galleries[$key]->parent_id
                ? $start = 0
                : $start++;
            ?>
        @endforeach
        </tbody>
    </table>
</div>
