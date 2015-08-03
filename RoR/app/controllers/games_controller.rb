class GamesController < ApplicationController
	def new
		@game=Game.new
	end

	def create
		@game=Game.new(game_params)
	end

	def index
	end	

	def update
		@game = Game.find(params[:id])
		if @game.update(game_params)
		else
		end
	end

	private
	def game_params
		params.require(:game).permit(:id,predictions_attributes: [:id,:scorelocalteam,:double,:scorevisitingteam])
	end
end