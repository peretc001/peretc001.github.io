
        <?if ($post->ID == 20):?>
            <h2>Большой зал</h2>
            <?get_template_part( 'template-parts/lessons1', get_post_format() );?>
            <h2>Малый зал</h2>
            <?get_template_part( 'template-parts/lessons2', get_post_format() );?>
        <?endif?>
        <?if ($post->ID == 17):?>
            <h2>Большой зал</h2>
            <?get_template_part( 'template-parts/lessons3', get_post_format() );?>
            <h2>Малый зал</h2>
            <?get_template_part( 'template-parts/lessons4', get_post_format() );?>
        <?endif?>
        