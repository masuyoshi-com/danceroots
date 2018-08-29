<?php
    $this->assign('description', 'Danceroots.netの運営会社。masuyoshi.comはWEB制作、システム設計・開発、サーバー運用・保守まで幅広く承っております。');
    $this->assign('title', '運営会社');
?>
<div class="row mt-5">
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 pt-3 pb-3">
        <h6 class="h6-responsive font-weight-bold dark-grey-text mb-0">
            <i class="fa fa fa-building mr-2" aria-hidden="true"></i>運営会社
        </h6>
        <hr class="my-2">
    </div>
</div>
<div class="card card-body mb-4">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td class="grey lighten-4 text-center" style="width: 20%">屋号</td>
                        <td style="width: 70%;">Masuyoshi.com</td>
                    </tr>
                    <tr>
                        <td class="grey lighten-4 text-center" style="width: 20%">URL</td>
                        <td style="width: 70%;">
                            <?= $this->Html->link('http://masuyoshi.com/', 'http://masuyoshi.com', ['class' => 'blue-text', 'target' => '_blank']) ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="grey lighten-4 text-center" style="width: 20%">代表</td>
                        <td style="width: 70%;">
                            益吉 正一
                        </td>
                    </tr>
                    <tr>
                        <td class="grey lighten-4 text-center" style="width: 20%">事業内容</td>
                        <td style="width: 70%;">
                            <ul>
                                <li>WEBホームページの企画・制作・運営</li>
                                <li>Webシステム開発・改善提案 【CRM/社内業務改善アプリケーションなど】</li>
                                <li>Linuxサーバーの運営、管理業務</li>
                                <li>AWSクラウドサーバー構築・運用・保守</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td class="grey lighten-4 text-center" style="width: 20%">設立</td>
                        <td style="width: 70%;">
                            2017年11月27日
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
