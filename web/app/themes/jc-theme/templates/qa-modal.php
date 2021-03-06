<button type="button" class="btn-sidekick btn-sidekick-mobile custom-tooltip" id="qa-btn" data-toggle="modal"
        data-target="#qa-modal"></button>

<section class="qa-modal">
    <div class="modal fade" id="qa-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content d-inline-flex justify-content-center">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel"><?php echo the_field('qa_title') ?></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="lead"><?php echo the_field('qa_about') ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</section>

