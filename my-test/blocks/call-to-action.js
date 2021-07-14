( function( blocks, editor, element ) {
	var el = element.createElement;

	blocks.registerBlockType( 'mcb/call-to-action', {
		title: 'SLICEmyPAGE: Call to Action', // The title of block in editor.
		icon: 'admin-comments', // The icon of block in editor.
		category: 'common', // The category of block in editor.
		attributes: {
		content: {
			type: 'string',
			default: 'Collaboratively customize web-enabled supply chains and turnkey collaboration and idea-sharing Assertively cultivate.'
		},
			button: {
				type: 'string',
				default: 'SLICEmyPAGE'
			}
		},
		edit: function( props ) {
		return (
			el( 'div', { className: props.className },
				el(
					editor.RichText,
					{
						tagName: 'div',
						className: 'mcb-call-to-action-content',
						value: props.attributes.content,
						onChange: function( content ) {
							props.setAttributes( { content: content } );
						}
					}
				),
				el(
					editor.RichText,
					{
						tagName: 'span',
						className: 'mcb-call-to-action-button',
						value: props.attributes.button,
						onChange: function( content ) {
							props.setAttributes( { button: content } );
						}
					}
				),
			)
		);
		},
		save: function( props ) {
		return (
			el( 'div', { className: props.className },
				el( editor.RichText.Content, {
					tagName: 'p',
					className: 'mcb-call-to-action-content',
					value: props.attributes.content,
				} ),
				el( 'button', { className: 'mcb-call-to-action-button' },
					props.attributes.button
				)
			)
		);
	},
	} );
} )( window.wp.blocks, window.wp.editor, window.wp.element );