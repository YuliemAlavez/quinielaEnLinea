class SeasonsController < ApplicationController

	def index
		@seasons=Season.all.order(seasonbegin: :asc)
	end
	def new
		@season=Season.new
		9.times { @season.games.build }
	end

	def newtotalseason
		@season=Season.new
	end

	def create
		#binding.pry #no funcionó marca un error
		@season=Season.new(season_params)
		if @season.save
			redirect_to seasons_path
		else
			render 'new'
		end
	end

	private
	def season_params
		params.require(:season).permit(:name, :seasonbegin, :seasonend, games_attributes: [:visitingteam_id,:scorelocalteam,:localteam_id,:scorevisitingteam,:game_at])
	end

end