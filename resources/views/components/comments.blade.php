<div class="row">
    <div class="col-lg-12">

        <div id="comments" class="comments">
            @if (have_comments())

                <div class="ark-section-title">
                    <div class="ark-title-frame">
                        <h4>
                            {!! sprintf(_nx('Uma resposta para &ldquo;%2$s&rdquo;', '%1$s Respostas para &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'sage'), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>') !!}
                        </h4>
                    </div>
                </div>

                <ul class="ark-comment-list">
                    {{ wp_list_comments('type=comment&callback=ark_comment') }}
                </ul>

                @if (get_comment_pages_count() > 1 && get_option('page_comments'))

                    {{-- pagination --}}
                    <div class="ark-a ark-pagination mb-4">

                        {{-- button --}}
                        @if (get_previous_comments_link())
                            <div class="ark-link ark-color-link ark-w-chevron ark-left-link ark-comment-layer">
                                {!! get_previous_comments_link(__('Comentários mais antigos')) !!}
                            </div>
                        @endif

                        {{-- button --}}
                        @if (get_next_comments_link())
                            <div class="ark-link ark-color-link ark-w-chevron ark-comment-layer">
                                {!! get_next_comments_link(__('Comentários mais novos')) !!}
                            </div>
                        @endif
                    </div>
                    {{-- pagination end --}}

                @endif
            @endif

        </div>


        <div class="ark-section-title">
            <div class="ark-title-frame">
                <h4>Comentários</h4>
            </div>
        </div>

        @php
            $comment_cookies = 'Salve meu nome, e-mail neste navegador para a próxima vez que eu comentar. ';
            $comments_args = [
                'fields' => [
                    'author' => '<div class="ark-form-field"><input id="author" name="author" class="ark-input" aria-required="true" placeholder="Nome" required/><label class="form-icon" for="author"><i class="fas fa-user"></i></label></div>',
                    'email' => '<div class="ark-form-field"><input id="email" name="email" class="ark-input" placeholder="E-mail"/><label class="form-icon" for="email"><i class="fas fa-at"></i></label></div>',
                    'cookies' => '<input class="mr-2" type="checkbox">' . $comment_cookies . '<a class="ark-link-header" href="' . get_privacy_policy_url() . '">Política de Privacidade</a>',
                ],
                'comment_field' => '<div class="ark-form-field"><textarea id="comment" class="ark-input" name="comment" placeholder="Comentário" aria-required="true" required></textarea><label class="form-icon" for="comment"><i class="fas fa-comment"></i></label></div>',
                'submit_button' => '<div class="ark-submit-frame"><button name="submit type="submit" id="submit" class="ark-btn ark-btn-md ark-submit"><span>Enviar Mensagem</span></button></div>',
                'title_reply' => '',
                'logged_in_as' => '',
                'comment_notes_after' => '',
                'comment_notes_before' => '',
                'cancel_reply_link' => 'Cancelar',
            ];
            comment_form($comments_args);
        @endphp
    </div>
</div>
