<?php

/**
 * Row with speakers for the day - shortcode: show_presentations_optin_day1
 *
 * @class FLCMShowPresentationsOptinDay
 */
class FLCMShowPresentationsOptinDay extends FLBuilderModule{

	/**
	 * @method __construct
	 */
	public function __construct(){
		parent::__construct([
			'name' => __('Row with speakers for the day.', 'fl-builder'),
			'description' => __('Presentations optin day', 'fl-builder'),
			'category' => __('Custom', 'fl-builder'),
			'group' => __('Custom Modules', 'fl-builder'),
			'partial_refresh' => true,
			#'icon' => 'schedule.svg',
		]);
	}

	/**
	 * @param object $settings A module settings object.
	 * @param object $helper A settings compatibility helper.
	 *
	 * @return object
	 */
	public function filter_settings($settings, $helper){
		return $settings;
	}

	/**
	 * @method update
	 */
	public function update($settings){
		return $settings;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('FLCMShowPresentationsOptinDay', [
	'general' => [
		'title' => __('General', 'fl-builder'),
		'sections' => [
			'general' => [
				'title' => '',
				'fields' => [
					'category' => [
						'type' => 'select',
						'label' => __('Category', 'fl-builder'),
						'default' => 'day-1',
						'options' => BBCMDataSource::getCatsList('category'),
					],
					'posts_per_page' => [
						'type' => 'unit',
						'label' => __('Posts per page', 'fl-builder'),
						'description' => __('-1 = all posts', 'fl-builder'),
						'default' => 6,
						'slider' => [
							'min' => -1,
							'max' => 30,
							'step' => 1,
						],
					],
					'orderby' => [
						'type' => 'select',
						'label' => __('Order by', 'fl-builder'),
						'default' => 'meta_value',
						'options' => [
							'ID' => 'ID',
							'name' => 'Name',
							'date' => 'Date',
							'meta_value' => 'Meta value',
						],
						'toggle' => [
							'meta_value' => [
								'fields' => ['meta_key'],
							],
						],
					],
					'meta_key' => [
						'type' => 'select',
						'label' => __('Meta key', 'fl-builder'),
						'default' => 'speaker_slot_of_the_day',
						'options' => [
							'speaker_slot_of_the_day' => 'Daily speaker slot',
							'speaker_slot_of_the_event' => 'Event speaker slot',
						],
						'connections' => ['string'],
					],
					'order' => [
						'type' => 'select',
						'label' => __('Order direction', 'fl-builder'),
						'default' => 'ASC',
						'options' => [
							'ASC' => 'ASC',
							'DESC' => 'DESC',
						],
					],
				],
			],
		],
	],
]);
