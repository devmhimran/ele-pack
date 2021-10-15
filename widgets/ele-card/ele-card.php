<?php

class Ele_Card extends \Elementor\Widget_Base{
    public function get_name() {
        return 'ele-card';
    }

	public function get_title() {
        return 'Ele Card';
    }

	public function get_icon() {
        return 'fas fa-minus-square';
    }

	public function get_categories() {
        return [ 'ele_pack_category' ];
    }

	public function get_script_depends() {
        return [ 'main_js' ];
    }

	public function get_style_depends() {
        return [ 'main_css' , 'bootstrap_css'];
    }

	protected function _register_controls() {

        $this->start_controls_section(
			'ele_pack_card_top_section',
			[
				'label' => __( 'Card Header', 'ele_pack' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'ele_pack_top_enable',
			[
				'label' => __( 'Show Card Top', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'top_enable' => __( 'Enable', 'ele_pack' ),
				'top_disable' => __( 'Disable', 'ele_pack' ),
				'return_value' => 'top_enable',
				'default' => 'top_enable',
			]
		);
        $this->add_control(
			'ele_pack_image_icon_enable',
			[
				'label' => __( 'Show icon or image', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
                'default' => 'image',
				'options' => [
					'image' => [
						'title' => __( 'Image', 'ele_pack' ),
						'icon' => 'fas fa-images',
					],
					'icon' => [
						'title' => __( 'Icon', 'ele_pack' ),
						'icon' => 'fas fa-icons',
					],
				],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'ele_pack_top_enable',
                            'operator' => '==',
                            'value' => 'top_enable',
                        ],
                    ],
                ],
                'toggle' => false,
            ]
		);
        $this->add_control(
            'ele_pack_top_image',
            [
                'label' => __( 'Choose Image', 'ele_pack' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'ele_pack_top_enable',
                            'operator' => '==',
                            'value' => 'top_enable',
                        ],
                        [
                            'name' => 'ele_pack_image_icon_enable',
                            'operator' => '==',
                            'value' => 'image',
                        ],
                    ],
				'toggle' => true,
                ],
                'dynamic' => [
                    'active' => true
                ]
            ]
        );
        $this->add_control(
			'ele_pack_top_icon',
			[
				'label' => __( 'Icon', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'ele_pack_top_enable',
                            'operator' => '==',
                            'value' => 'top_enable',
                        ],
                        [
                            'name' => 'ele_pack_image_icon_enable',
                            'operator' => '==',
                            'value' => 'icon',
                        ],
                    ],
				'toggle' => true,
                ],
			]
		);
        $this->add_control(
			'ele_pack_card_top_align',
			[
				'label' => __( 'Alignment', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'ele_pack' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ele_pack' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'ele_pack' ),
						'icon' => 'eicon-text-align-right',
					],
				],     
				'default' => 'center',
				'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .card-icon,.card-img' => 'text-align: {{VALUE}};',
                ],
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'ele_pack_top_enable',
                            'operator' => '==',
                            'value' => 'top_enable',
                        ],
                    ],
				'toggle' => true,
                ],
			]
		);
		$this->end_controls_section();
        $this->start_controls_section(
			'ele_pack_card_content',
			[
				'label' => __( 'Card Content', 'ele_pack' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'ele_pack_card_title',
			[
				'label' => __( 'Title', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __( 'Default title', 'ele_pack' ),
				'placeholder' => __( 'Type your title here', 'ele_pack' ),
                'dynamic' => [
                    'active' => true
                ]
			]
		);
        $this->add_control(
			'ele_pack_card_description',
			[
				'label' => __( 'Description', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 5,
				'default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500', 'ele_pack' ),
				'placeholder' => __( 'Type your description here', 'ele_pack' ),
                'dynamic' => [
                    'active' => true
                ]
			]
		);
        $this->end_controls_section();
        $this->start_controls_section(
			'ele_pack_card_button',
			[
				'label' => __( 'Card Button', 'ele_pack' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'ele_pack_enable_card_button',
			[
				'label' => __( 'Show Button', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'enable_button' => __( 'Enable', 'ele_pack' ),
				'disable_button' => __( 'Disable', 'ele_pack' ),
				'return_value' => 'enable_button',
				'default' => 'enable_button',
			]
		);
        $this->add_control(
			'ele_pack_card_button_style',
			[
				'label' => __( 'Button Style', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'card-text-btn',
				'options' => [
					'card-text-btn'  => __( 'Text Button', 'ele_pack' ),
					'card-btn' => __( 'Button', 'ele_pack' ),
				],
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'ele_pack_enable_card_button',
                            'operator' => '==',
                            'value' => 'enable_button',
                        ],
                    ],
				'toggle' => true,
                ],
			]
		);
        $this->add_control(
			'ele_pack_card_button_title',
			[
				'label' => __( 'Button Text', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Read More', 'ele_pack' ),
				'placeholder' => __( 'Type your title here', 'ele_pack' ),
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'ele_pack_enable_card_button',
                            'operator' => '==',
                            'value' => 'enable_button',
                        ],
                    ],
				'toggle' => true,
                ],
			]
		);
        $this->add_control(
			'ele_pack_card_button_align',
			[
				'label' => __( 'Alignment', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'ele_pack' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ele_pack' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'ele_pack' ),
						'icon' => 'eicon-text-align-right',
					],
				],     
				'default' => 'center',
				'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .button-text,.button-main' => 'text-align: {{VALUE}};',
                ],
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'ele_pack_enable_card_button',
                            'operator' => '==',
                            'value' => 'enable_button',
                        ],
                    ],
				'toggle' => true,
                ],
			]
		);
        $this->add_control(
			'ele_pack_card_button_link',
			[
				'label' => __( 'Link', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'ele_pack' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'ele_pack_enable_card_button',
                            'operator' => '==',
                            'value' => 'enable_button',
                        ],
                    ],
				'toggle' => true,
                ],
                'dynamic' => [
                    'active' => true
                ]
			]
		);
        $this->end_controls_section();
        $this->start_controls_section(
			'ele_pack_card_style',
			[
				'label' => __( 'Card Style', 'ele_pack' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'ele_pack_card_style_heading',
			[
				'label' => __( 'Card Hover', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->start_controls_tabs(
			'card_style_tabs'
		);
        $this->start_controls_tab(
			'card_style_tab_normal',
			[
				'label' => __( 'Normal', 'ele_pack' ),
			]
		);
        // $this->add_control(
		// 	'ele_pack_card_background_color_normal',
		// 	[
		// 		'label' => __( 'Background Color', 'ele_pack' ),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .card' => 'background-color: {{VALUE}}',
		// 		],
		// 	]
		// );
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'ele_pack_card_background_color_normal',
				'label' => __( 'Background', 'plugin-domain' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .card',
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'ele_pack_card_shadow_normal',
				'label' => __( 'Box Shadow', 'ele_pack' ),
				'selector' => '{{WRAPPER}} .card',
			]
		);
        $this->end_controls_tab();
        $this->start_controls_tab(
			'card_style_tab_hover',
			[
				'label' => __( 'Hover', 'ele_pack' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'ele_pack_card_background_color_hover',
				'label' => __( 'Background', 'plugin-domain' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .card:hover',
			]
		);
		$this->add_control(
			'ele_pack_card_icon_hover',
			[
				'label' => __( 'Icon Color', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card:hover .ele_pack_icon' => 'color: {{VALUE}}!important',
				],
				'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'ele_pack_top_enable',
                            'operator' => '==',
                            'value' => 'top_enable',
                        ],
                        [
                            'name' => 'ele_pack_image_icon_enable',
                            'operator' => '==',
                            'value' => 'icon',
                        ],
                    ],
				'toggle' => true,
                ],
			]
		);
        $this->add_control(
			'ele_pack_card_icon_background_hover',
			[
				'label' => __( 'Icon Background Color', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card:hover .ele_pack_icon' => 'background-color: {{VALUE}}!important',
				],
				'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'ele_pack_top_enable',
                            'operator' => '==',
                            'value' => 'top_enable',
                        ],
                        [
                            'name' => 'ele_pack_image_icon_enable',
                            'operator' => '==',
                            'value' => 'icon',
                        ],
                    ],
				'toggle' => true,
                ],
			]
		);
        $this->add_control(
			'ele_pack_card_icon_border_hover',
			[
				'label' => __( 'Icon Border Color', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card:hover .ele_pack_icon' => 'border-color: {{VALUE}}',
				],
				'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'ele_pack_top_enable',
                            'operator' => '==',
                            'value' => 'top_enable',
                        ],
                        [
                            'name' => 'ele_pack_image_icon_enable',
                            'operator' => '==',
                            'value' => 'icon',
                        ],
                    ],
				'toggle' => true,
                ],
			]
		);
        $this->add_control(
			'ele_pack_card_Title_color',
			[
				'label' => __( 'Title Color', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card:hover .card-heading' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'ele_pack_card_des_hover',
			[
				'label' => __( 'Description Color', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card:hover .card-text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'ele_pack_card_text_btn_hover',
			[
				'label' => __( 'Text Button Color', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card:hover .card-text-btn' => 'color: {{VALUE}}',
				],
				'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'ele_pack_enable_card_button',
                            'operator' => '==',
                            'value' => 'enable_button',
                        ],
						[
                            'name' => 'ele_pack_card_button_style',
                            'operator' => '==',
                            'value' => 'card-text-btn',
                        ],
                    ],
				'toggle' => true,
                ],
			]
		);
        // $this->add_control(
		// 	'ele_pack_card_background_color_hover',
		// 	[
		// 		'label' => __( 'Background Color', 'ele_pack' ),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .card:hover' => 'background-color: {{VALUE}}',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'ele_pack_card_hr_one',
		// 	[
		// 		'type' => \Elementor\Controls_Manager::DIVIDER,
		// 	]
		// );

        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'ele_pack_card_shadow_hover',
				'label' => __( 'Box Shadow', 'ele_pack' ),
				'selector' => '{{WRAPPER}} .card:hover',
			]
		);
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control(
			'ele_pack_card_hr_two',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'ele_pack_card_border',
				'label' => __( 'Border', 'ele_pack' ),
				'selector' => '{{WRAPPER}} .card',
			]
		);
        $this->add_control(
			'ele_pack_card_border_radius',
			[
				'label' => __( 'Border Radius', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'ele_pack_card_padding',
			[
				'label' => __( 'Padding', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .card-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section();
        $this->start_controls_section(
			'ele_pack_card_top_image_style',
			[
				'label' => __( 'Card Header', 'ele_pack' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'ele_pack_top_enable',
                            'operator' => '==',
                            'value' => 'top_enable',
                        ],
                        [
                            'name' => 'ele_pack_image_icon_enable',
                            'operator' => '==',
                            'value' => 'image',
                        ],
                    ],
				'toggle' => true,
                ],
			]
		);
        $this->add_control(
			'ele_pack_card_top_image_width',
			[
				'label' => __( 'Width', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .avatar-image' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'ele_pack_card_top_image_height',
			[
				'label' => __( 'Height', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .avatar-image' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'ele_pack_card_image_object_fit',
			[
				'label' => __( 'Object Fit', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'contain',
				'options' => [
					'fill' => __( 'Fill', 'ele_pack' ),
					'cover' => __( 'Cover', 'ele_pack' ),
					'contain' => __( 'Contain', 'ele_pack' ),
				],
                'selectors' => [
					'{{WRAPPER}} .avatar-image' => 'object-fit: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'ele_pack_card_image_box_shadow',
				'label' => __( 'Box Shadow', 'ele_pack' ),
				'selector' => '{{WRAPPER}} .avatar-image',
			]
		);
        $this->add_control(
			'ele_pack_card_image_border_radius',
			[
				'label' => __( 'Border Radius', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .avatar-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'ele_pack_card_image_top_gap',
			[
				'label' => __( 'Top Gap', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .avatar-image' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section();
        $this->start_controls_section(
			'ele_pack_card_icon_style',
			[
				'label' => __( 'Card Header', 'ele_pack' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'ele_pack_top_enable',
                            'operator' => '==',
                            'value' => 'top_enable',
                        ],
                        [
                            'name' => 'ele_pack_image_icon_enable',
                            'operator' => '==',
                            'value' => 'icon',
                        ],
                    ],
				'toggle' => true,
                ],
			]
		);
        $this->add_control(
			'ele_pack_card_icon_size',
			[
				'label' => __( 'Icon', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ele_pack_icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'ele_pack_card_icon_color',
			[
				'label' => __( 'Color', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ele_pack_icon' => 'color: {{VALUE}} ',
				],
			]
		);
        $this->add_control(
			'ele_pack_card_icon_background_color',
			[
				'label' => __( 'Background Color', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ele_pack_icon' => 'background-color: {{VALUE}} !important',
				],
			]
		);
        $this->add_control(
			'ele_pack_card_icon_divider_one',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'ele_pack_card_icon_border',
				'label' => __( 'Border', 'ele_pack' ),
				'selector' => '{{WRAPPER}} .ele_pack_icon',
			]
		);
        $this->add_control(
			'ele_pack_card_icon_border_radius',
			[
				'label' => __( 'Border Radius', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ele_pack_icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'ele_pack_card_icon_padding',
			[
				'label' => __( 'Padding', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ele_pack_icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'ele_pack_card_icon_divider_two',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
			'ele_pack_card_icon_top_gap',
			[
				'label' => __( 'Top Gap', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .card-icon' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'ele_pack_card_icon_box_shadow',
				'label' => __( 'Box Shadow', 'ele_pack' ),
				'selector' => '{{WRAPPER}} .ele_pack_icon',
			]
		);
        $this->end_controls_section();
        $this->start_controls_section(
			'ele_pack_card_content_style',
			[
				'label' => __( 'Card Content', 'ele_pack' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'ele_pack_card_content_title_typography',
				'label' => __( 'Typography', 'ele_pack' ),
				'selector' => '{{WRAPPER}} .card-heading',
			]
		);
        $this->add_control(
			'ele_pack_card_content_title_color',
			[
				'label' => __( 'Title Color', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-heading' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'ele_pack_card_content_title_align',
			[
				'label' => __( 'Alignment', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'ele_pack' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ele_pack' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'ele_pack' ),
						'icon' => 'eicon-text-align-right',
					],
				],     
				'default' => 'center',
				'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .card-heading' => 'text-align: {{VALUE}};',
                ],
			]
		);
		$this->add_control(
			'ele_pack_card_content_title_gap',
			[
				'label' => __( 'Top Gap', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .card-heading' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'ele_pack_card_content_one',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'ele_pack_card_content_des_typography',
				'label' => __( 'Title Typography', 'ele_pack' ),
				'selector' => '{{WRAPPER}} .card-text',
			]
		);
        $this->add_control(
			'ele_pack_card_content_des_color',
			[
				'label' => __( 'Description Color', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'ele_pack_card_content_des_align',
			[
				'label' => __( 'Alignment', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'ele_pack' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ele_pack' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'ele_pack' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Right', 'ele_pack' ),
						'icon' => 'eicon-text-align-justify',
					],
				],     
				'default' => 'center',
				'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .card-text' => 'text-align: {{VALUE}};',
                ],		
			]
		);
		$this->add_control(
			'ele_pack_card_content_des_gap',
			[
				'label' => __( 'Top Gap', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .card-text' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section();
		$this->start_controls_section(
			'ele_pack_card_text_button_style_section',
			[
				'label' => __( 'Text Button Style', 'ele_pack' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'ele_pack_enable_card_button',
                            'operator' => '==',
                            'value' => 'enable_button',
                        ],
						[
                            'name' => 'ele_pack_card_button_style',
                            'operator' => '==',
                            'value' => 'card-text-btn',
                        ],
                    ],
				'toggle' => true,
                ],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'ele_pack_card_text_button_typography',
				'label' => __( 'Typography', 'ele_pack' ),
				'selector' => '{{WRAPPER}} .card-text-btn',
			]
		);
		$this->add_control(
			'ele_pack_card_text_button_color',
			[
				'label' => __( 'Color', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-text-btn' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'ele_pack_card_text_button_color_hover',
			[
				'label' => __( 'Hover Color', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-text-btn:hover' => 'color: {{VALUE}}!important',
				],
			]
		);
		$this->add_control(
			'ele_pack_card_text_button_gap',
			[
				'label' => __( 'Top Gap', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .button-text' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'ele_pack_card_button_style_section',
			[
				'label' => __( 'Button Style', 'ele_pack' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name' => 'ele_pack_enable_card_button',
                            'operator' => '==',
                            'value' => 'enable_button',
                        ],
						[
                            'name' => 'ele_pack_card_button_style',
                            'operator' => '==',
                            'value' => 'card-btn',
                        ],
                    ],
				'toggle' => true,
                ],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'ele_pack_card_button_typography',
				'label' => __( 'Typography', 'ele_pack' ),
				'selector' => '{{WRAPPER}} .button-main',
			]
		);
		$this->start_controls_tabs(
			'ele_pack_card_button_style_tabs'
		);
		$this->start_controls_tab(
			'ele_pack_card_button_normal_tab',
			[
				'label' => __( 'Normal', 'ele_pack' ),
			]
		);
		$this->add_control(
			'ele_pack_card_button_color',
			[
				'label' => __( 'Color', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-btn' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'ele_pack_card_button_background_color',
			[
				'label' => __( 'Background Color', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-btn' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'ele_pack_card_button_hover_tab',
			[
				'label' => __( 'Hover', 'ele_pack' ),
			]
		);
		$this->add_control(
			'ele_pack_card_button_hover_color',
			[
				'label' => __( 'Color', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-btn:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'ele_pack_card_button_background_hover_color',
			[
				'label' => __( 'Background Color', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-btn:hover' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'ele_pack_card_button_border',
				'label' => __( 'Border', 'ele_pack' ),
				'selector' => '{{WRAPPER}} .card-btn',
			]
		);
		$this->add_control(
			'ele_pack_card_button_divider_one',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'ele_pack_card_button_padding',
			[
				'label' => __( 'Padding', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .card-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'ele_pack_card_button_gap',
			[
				'label' => __( 'Top Gap', 'ele_pack' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .button-main' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();
        $card_title = $settings['ele_pack_card_title'];
        $card_des = $settings['ele_pack_card_description'];
		$card_image_icon_enable = $settings['ele_pack_image_icon_enable'];
        $card_icon = $settings['ele_pack_top_icon'];
        $card_image = $settings['ele_pack_top_image'];
        $card_top_enable = $settings['ele_pack_top_enable'];
        $enable_card_button = $settings['ele_pack_enable_card_button'];
        $button_text = $settings['ele_pack_card_button_title'];
        $button_style = $settings['ele_pack_card_button_style'];
        $button_link = $settings['ele_pack_card_button_link'];
    

		?>
        <div class="card">
		<?php
		if($card_top_enable == 'top_enable'){
		if($card_image_icon_enable == 'icon'){ ?>
			<div class="card-icon">
                <i class="<?php echo esc_attr($card_icon["value"]) ?> ele_pack_icon"></i>
            </div>
			<?php }else{ ?>
			<div class="card-img">  
            	<img class="avatar-image" src="<?php echo $card_image["url"] ?>" alt="">
            </div>
			<?php } }?>
                <div class="card-body">         
                    <div class="card-content">
                        <h1 class="card-heading"><?php echo esc_attr($card_title); ?></h1>
                        <p class="card-text"><?php echo esc_attr($card_des); ?></p>
						<?php 
						if($enable_card_button == 'enable_button'){
						if($button_style == 'card-text-btn'){
						?>
						<div class="button-text">
								<a href="<?php echo esc_attr($button_link['url']) ?>" class="<?php echo esc_attr($button_style) ?>"><?php echo esc_attr($button_text) ?></a>
						</div>
						<?php }else{ ?>
							<div class="button-main">
								<a href="<?php echo esc_attr($button_link['url']) ?>" class="<?php echo esc_attr($button_style) ?>"><?php echo esc_attr($button_text) ?></a>
							</div>
						<?php } } ?>
                    </div>
                </div>
            </div>
        <?php
        

    }
	protected function _content_template() {}
}



