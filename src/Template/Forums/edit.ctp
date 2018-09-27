<?php $this->assign('title', 'スレッド編集'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="d-flex">
            <div>
                <h5 class="h5-responsive font-weight-bold">
                    <i class="fa fa-comments cyan-text" aria-hidden="true"></i> Dance Forum Thread <i class="fa fa-pencil pink-text" aria-hidden="true"></i>
                </h5>
            </div>
            <div class="ml-auto">
                <p class="m-0 grey-text"><small>スレッド編集</small></p>
            </div>
        </div>
        <hr class="mt-0">
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<div class="card border-danger mb-3">
    <div class="card-header" style="background-color: #f5f5f5;">注意事項</div>
    <div class="card-body text-danger">
        <h5 class="card-title">誹謗中傷・いたずらは禁止です。</h5>
        <p class="card-text">
            ダンスに関する悩み・相談・建設的な議論・雑談などを行いましょう。より気軽に相談できるように、匿名での書き込みが可能です。<br>
            ただし、いたずらなどのトラブルが起きた場合の対処を行うため、運営会社は匿名でも誰がいつ書き込みをしたのかを判別することができます。ルールを守って利用してください。
        </p>
    </div>
</div>

<div class="row mt-4 mb-3">
    <div class="col-lg-2 col-md-3 col-xs-12">
    </div>
    <??>
    <div class="col-lg-8 col-md-6 col-xs-12">
        <div class="card card-body">

            <div class="row">
                <div class="col-lg-12">
                    <?= $this->Flash->render() ?>
                </div>
            </div>

            <?= $this->Form->create($forum) ?>
            <?= $this->Form->hidden('user_id', ['value' => $logins['id']]) ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->control('category',
                            [
                                'id'      => 'f--category',
                                'type'    => 'select',
                                'class'   => 'mdb-select colorful-select dropdown-primary',
                                'options' => $categories,
                            ]
                        ) ?>
                        <label for="f--category">カテゴリ <span class="red-text">※</span></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <label class="dark-gray-text w-100 text-left"><small>タイトル <span class="red-text">※</span></small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('title', ['class' => 'form-control']) ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->textarea('body',
                            [
                                'id'    => 'f--body',
                                'class' => 'form-control md-textarea',
                                'rows'  => '7',
                            ]
                        ) ?>
                        <label for="f--body">内容 <span class="red-text">※</span></label>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-6 col-xs-12">
                    <label class="dark-gray-text w-100 text-left"><small>YouTube</small> <span class="badge badge-primary">内容による参考動画など</span></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('youtube', ['class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="form-check pt-4">
                        <?= $this->Form->checkbox('anonymous_flag', ['class' => 'form-check-input', 'id' => 'materialUnchecked']) ?>
                        <label class="form-check-label dark-grey-text" for="materialUnchecked">匿名にする</label>
                    </div>
                    <hr>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12">
                    <?= $this->Form->button(__('<i class="fa fa-edit mr-2" aria-hidden="true"></i>スレッド編集'),
                        ['type' => 'submit', 'class' => 'btn btn-primary btn-block', 'escape' => false])
                    ?>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div><!-- /.card -->
    </div><!-- /.col-lg-8 -->
    <div class="col-lg-2 col-md-3 col-xs-12">
    </div>
</div><!-- /.row -->
