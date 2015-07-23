

        <div class="span6">
			<?php if ($this->config->item('third_party_auth_providers')) : ?>
            <h3><?php echo sprintf(lang('sign_in_third_party_heading')); ?></h3>
            <ul>
				<?php foreach ($this->config->item('third_party_auth_providers') as $provider) : ?>
                <li class="third_party <?php echo $provider; ?>"><?php echo anchor('account/connect_'.$provider, ' ', array('title' => sprintf(lang('sign_in_with'), lang('connect_'.$provider)))); ?></li>
				<?php endforeach; ?>
            </ul>
			<?php endif; ?>
        </div>
        <!-- /span6 -->
    </div>